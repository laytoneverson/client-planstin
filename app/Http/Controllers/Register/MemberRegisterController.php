<?php

namespace App\Http\Controllers\Register;

use App\Entities\GroupClient;
use App\Entities\BenefitPlan;
use App\Entities\Member;
use App\Entities\MemberDependent;
use App\Entities\User;
use App\Exceptions\InvalidPasswordException;
use App\Exceptions\UserAlreadyExistsException;
use App\Form\Member\MemberType;
use App\Form\NewUserType;
use App\Http\Controllers\Controller;
use App\Services\UserAccountService;
use App\Utils\UsesEntityManagerTrait;
use Barryvdh\Form\CreatesForms;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class MemberRegisterController extends Controller
{
    use UsesEntityManagerTrait, CreatesForms;

    /**
     * @var UserAccountService
     */
    private $accountService;

    public function __construct(EntityManagerInterface $entityManager, UserAccountService $accountService)
    {
        $this->entityManager = $entityManager;
        $this->accountService = $accountService;

        parent::__construct();
    }

    /**
     * @param Request $request
     * @param null $groupClientSfObjectId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function signup(Request $request, $groupClientSfObjectId = null)
    {
        if ($groupClientSfObjectId) {
            $request->session()->put('groupClientSfObjectId', $groupClientSfObjectId);
        } else {
            $groupClientSfObjectId = $request->session()->get('groupClientSfObjectId');

            if (null === $groupClientSfObjectId) {
                $request->session()->flash('error','No client found. Please enter through a referral link');
            }

            return \redirect()->route('register.member.signup');
        }

        /** @var GroupClient $groupClient */
        $groupClient = $this->getGroupClientRepository()->findBySalesForceObjectId($groupClientSfObjectId);

        $newUser = new User();
        $newUser->setGroupClient($groupClient);

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
                        'info',
                        'A user with this account already exists but the password does not match.'
                    );
                }
            }
        }

        if ($moveOn) {
            return \redirect()->route('register.member.enrollment');
        }

        return $this->view('member.register.signup', [
            'form' => $form->createView(),
        ]);
    }

    public function enrollment(Request $request)
    {
        $user = $this->accountService->getCurrentUser();
        $groupClient = $user->getGroupClient();

        $member = new Member();
        $member
            ->setGroupClient($groupClient)
            ->addDependent(new MemberDependent());

        $form = $this->createForm(MemberType::class, $member);

        if ($form->isSubmitted() && $form->isValid()) {
            $member->createSelfDependent();
            $this->entityManager->persist($member);
        }

        return $this->view('member.register.enrollment', [
            'form' => $form->createView(),
        ]);
    }

    public function agreement(Request $request)
    {
        return $this->view('member.register.agreement');
    }
}
