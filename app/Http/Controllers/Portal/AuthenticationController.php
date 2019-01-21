<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthenticationController extends Controller
{
    use AuthenticatesUsers;

    protected $viewFolder = '';
    protected $redirectTo = '';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        parent::__construct();
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validateLogin($request);

            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);
                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }

        return $this->view($this->getViewPath('login.login'));
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return redirect()->route($this->redirectTo);
    }

    public function forgotPassword(Request $request)
    {
        
        return $this->view($this->getViewPath('login.forgot'));
    }

    public function resetPassword(Request $request)
    {
        
        return $this->view($this->getViewPath('login.pass-reset'));
    }

    public function recoveryCode(Request $request)
    {
       
       return $this->view($this->getViewPath('login.recovery-code'));
    }

    protected function redirectToRoute()
    {
        return $this->redirectTo;
    }

    protected function getViewPath(string $viewName)
    {
        return \sprintf('%s.%s', $this->viewFolder, $viewName);
    }
}
