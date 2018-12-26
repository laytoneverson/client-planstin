<?php 
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request; 

class LoginController extends Controller {

    public function login(Request $reqest){
        return $this->view('client.login.login');
    }
    public function forgotPassword(Request $reqest){
        
        return $this->view('client.login.forgot');
    }
    public function resetPassword(Request $reqest){
        
        return $this->view('client.login.pass-reset');
    }
    public function recoveryCode(Request $reqest){
       
       return $this->view('client.login.recovery-code');
    }
}