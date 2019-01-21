<?php

namespace App\Http\Controllers\Register;

use App\Entities\BenefitPlan;
use App\Entities\GroupClient;
use App\Exceptions\InvalidPasswordException;
use App\Exceptions\SalesForce\SalesForceApiException;
use App\Exceptions\UserAlreadyExistsException;
use App\Form\GroupClientAgreementFormType;
use App\Form\GroupClientFormType;
use App\Form\GroupClientServicesOfferedFormType;
use App\Form\Handler\GroupClientServicesOfferedFormHandler;
use App\Services\ClientRegistrationService;
use App\Services\SalesForce\Persistence\GroupClientPersistenceService;
use App\Services\UserAccountService;
use App\Utils\UsesEntityManagerTrait;
use Barryvdh\Form\CreatesForms;
use App\Http\Controllers\Controller;
use App\Entities\User; 
use App\Form\NewUserType;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class ClientRegisterController extends Controller
{
    use CreatesForms, UsesEntityManagerTrait;

    /**
     * @var ClientRegistrationService
     */

    private $clientRegistration;

    /**
     * @var UserAccountService
     */
    private $accountService;

    public function __construct(
        ClientRegistrationService $clientRegistration,
        UserAccountService $accountService,
        EntityManagerInterface $entityManager
    ) {
        $this->clientRegistration = $clientRegistration;
        $this->accountService = $accountService;
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    /**
     * @param Request $request
     * @param UserAccountService $accountService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function signup(Request $request)
    {
        $newUser = new User();
   
        $form = $this->createForm(NewUserType::class, $newUser);
        $form->handleRequest($request);

        if ($form->isValid()) {

            try {

                $this->accountService->createNewUserAccount($newUser);

            } catch (UserAlreadyExistsException $exception) {

                $request->session()->flash(
                    'A user with this account already exists... please login to continue.'
                );

                return \redirect()->route('login.client');
            }
        }

        return $this->view(
            'client.register.signup',
            [   
                'form' => $form->createView()
            ]
        );
    }


    public function profile(Request $request)
    {
        $user = $this->accountService->getCurrentUser();

        if (!$groupClient = $user->getGroupClient()) {
            $groupClient = new GroupClient();
            $groupClient->setSignupStep(GroupClient::ENROLL_STEP_PROFILE);
            $user
                ->setAdminOf($groupClient)
                ->setGroupClient($groupClient);
        }

        $form = $this
            ->createForm(GroupClientFormType::class, $groupClient)
            ->handleRequest($request);

        if ($form->isValid()) {
            
            /** @var GroupClientPersistenceService $persistenceService */
            $persistenceService = GroupClient::getSalesForcePersistenceService();

            try {
                
                if ($groupClient->getSfObjectId()) {
                    $persistenceService->updateObject($groupClient);
                } else {
                    $persistenceService->addObject($groupClient);
                    $this->getEntityManager()->persist($groupClient);
                    $this->getEntityManager()->persist($groupClient->getPrimaryContact());
                }
                $groupClient->setSignupStep(GroupClient::ENROLL_STEP_SERVICES);

                $this->getEntityManager()->flush();
                return \redirect()->route('register.client.services');
            
            } catch (SalesForceApiException $apiException) {

                $request->session()->flash('error', $apiException->getMessage());
                \report($apiException);
                throw $apiException;

            } catch (\Throwable $throwable) {

                throw $throwable;
            }
        }

        return $this->view(
            'client.register.profile',
            [
                'form' => $form->createView(),
            ]
        );
    }

    public function services(Request $request)
    {
        /** @var BenefitPlan[] $plans */
        $plans = $this->getBenefitPlanFamilyRepository()->findAllPlanFamilies();
        $client = $this->accountService->getCurrentUser()->getGroupClient();

        /**
         * @var GroupClientServicesOfferedFormHandler $formHandler
         */
        $formHandler = app(GroupClientServicesOfferedFormHandler::class, ['groupClient' => $client]);

        $form = $this->createForm(
            GroupClientServicesOfferedFormType::class,
            $formHandler,
            ['handler' => $formHandler]
        );

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {

            $formHandler->updateSelectedPlans();

            try {
                //plans are automatically added to sales force on flush using an event subscriber.
                $client->setSignupStep(GroupClient::ENROLL_STEP_AGREEMENT);
                $this->entityManager->flush();
                return \redirect()->route('register.client.agreements');

            } catch (\Throwable $exception) {

                $request->session()->flash('error', $exception->getMessage());
                \report($exception);

                throw $exception;
            }
        }

        return $this->view(
            'client.register.services', [
                'currentGroupClientPlans' => $client->getPlansOffered(),
                'planCategories' => $plans,
                'form' => $form->createView(),
            ]
        );
    }

    public function agreement(Request $request)
    {
        $groupClient = $this->accountService
            ->getCurrentUser()
            ->getGroupClient();

        $form = $this->createForm(GroupClientAgreementFormType::class, $groupClient);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {

            try {

                $persistenceService = GroupClient::getSalesForcePersistenceService();
                $persistenceService->updateObject($groupClient);
                $groupClient->setSignupStep(GroupClient::ENROLL_STEP_BILLING);

                $this->entityManager->flush();

                return \redirect()->route('register.client.billing');

            } catch (\Throwable $exception) {

                $request->session()->flash('error', $exception->getMessage());
                \report($exception);

                throw $exception;
            }
        }

        return $this->view('client.register.sign-agreement', [
            'form' => $form->createView(),
        ]);
    }

    public function billing()
    {
        return $this->view('client.register.payment-method');
    }

    public function employees()
    {
        return $this->view('client.register.profile');
    }
}
