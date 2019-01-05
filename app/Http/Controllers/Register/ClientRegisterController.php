<?php

namespace App\Http\Controllers\Register;

use App\Entities\BenefitPlan;
use App\Exceptions\InvalidPasswordException;
use App\Exceptions\UserAlreadyExistsException;
use App\Form\GroupClientAgreementFormType;
use App\Form\GroupClientFormType;
use App\Form\GroupClientServicesOfferedFormType;
use App\Form\Handler\GroupClientServicesOfferedFormHandler;
use App\Services\ClientRegistrationService;
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

        $moveOn = false;
        if ($form->isValid()) {

            try {

                $this->accountService->createNewUserAccount($newUser);
                $moveOn = true;

            } catch (UserAlreadyExistsException $exception) {

                try {

                    $this->accountService->authenticateUser($newUser);
                    $moveOn = true;

                } catch (InvalidPasswordException $exception) {

                    $request->session()->flash(
                        'A user with this account already exists but the password does not match.'
                    );
                }
            }
        }

        if($moveOn) {
            return \redirect()->route('register.client.profile');
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
            $groupClient = $this->clientRegistration->prepareNewClient();
        }

        $form = $this
            ->createForm(GroupClientFormType::class, $groupClient)
            ->handleRequest($request);

        if ($form->isValid()) {

            if ($success = $this->clientRegistration->insertSalesForceClient($groupClient)) {
                return \redirect()->route('register.client.services');
            }

            $request->session()->flash('error', $this->clientRegistration->getError());

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
        $plans = $this->getBenefitPlanRepository()->getActiveBenefitPlans();
        $client = $this->accountService->getCurrentUser()->getGroupClient();

        $planFamilies = BenefitPlan::getPlanFamilies();

        $viewPlans = [];
        foreach ($planFamilies as $k => $planFamily) {
            $viewPlans[$planFamily] = [];
        }

        foreach ($plans as $plan) {
            $viewPlans[$plan->getPlanFamily()][] = $plan;
        }

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
                'planCategories' => $viewPlans,
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

            $groupClient->setForUpdate();
            try {

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
