<?php 
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller; 

class LoginController extends Controller {

    public function login(){
        return $this->view('client.login.login');
    }
    public function forgotPassword(){
        
        return $this->view('client.login.forgot');
    }
    public function resetPassword(){
        
        return $this->view('client.login.pass-reset');
    }
    public function recoveryCode(){
       
       return $this->view('client.login.recovery-code');
    }
}