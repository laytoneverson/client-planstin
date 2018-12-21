<?php 
namespace App\Http\Controllers\Client;

use App\Exceptions\InvalidPasswordException;
use App\Exceptions\UserAlreadyExistsException;
use App\Form\GroupClientFormType;
use App\Services\ClientRegistrationService;
use App\Services\UserAccountService;
use Barryvdh\Form\CreatesForms;
use App\Http\Controllers\Controller;
use App\Entities\User; 
use App\Form\NewUserType;
use Illuminate\Http\Request;

class RegisterController extends Controller 
{
    use CreatesForms;

    /**
     * @var ClientRegistrationService
     */

    private $clientRegistration;

    /**
     * @var UserAccountService
     */
    private $accountService;

    public function __construct(ClientRegistrationService $clientRegistration, UserAccountService $accountService)
    {
        $this->clientRegistration = $clientRegistration;
        $this->accountService = $accountService;

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
            return \redirect()->route('client_register_profile');
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
                return \redirect()->route('client_register_services');
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

    public function services()
    {
        return $this->view('client.register.services');
    }

    public function agreement()
    {
        return $this->view('client.register.profile');
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
