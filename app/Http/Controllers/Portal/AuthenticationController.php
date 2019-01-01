<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request; 

class AuthenticationController extends Controller
{
    protected $viewFolder = '';

    public function login(Request $request)
    {
        return $this->view($this->getViewPath('login.login'));
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

    protected function getViewPath(string $viewName)
    {
        return \sprintf('%s.%s', $this->viewFolder, $viewName);
    }
}
