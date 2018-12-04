<?php 
namespace App\Http\Controllers\Client;

use App\Exceptions\InvalidPasswordException;
use App\Exceptions\UserAlreadyExistsException;
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
     * @param Request $request
     * @param UserAccountService $accountService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function createUser(Request $request, UserAccountService $accountService)
    {
        $newUser = new User();
   
        $form = $this->createForm(NewUserType::class, $newUser);
        
        $form->handleRequest($request);

        $moveOn = false;
        if ($form->isValid()) {
            try {

                $accountService->createNewUserAccount($newUser);
                $moveOn = true;

            } catch (UserAlreadyExistsException $exception) {

                try {

                    $accountService->authenticateUser($newUser);
                    $moveOn = true;

                } catch (InvalidPasswordException $exception) {

                    $request->session()->flush(
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


    public function profile()
    {
        return $this->view('client.register.profile');
    }

    public function services()
    {
        return $this->view('client.register.profile');
    }

    public function agreement()
    {
        return $this->view('client.register.profile');
    }

    public function billing()
    {

    }

    public function employees()
    {
        return $this->view('client.register.profile');
    }
}
