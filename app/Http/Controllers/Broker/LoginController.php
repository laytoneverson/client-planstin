<?php 
namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request; 

class LoginController extends Controller {

    public function login(Request $request){
        return $this->view('broker.login.login');
    }
    public function forgotPassword(Request $request){
        
        return $this->view('broker.login.forgot');
    }
    public function resetPassword(Request $request){
        
        return $this->view('broker.login.pass-reset');
    }
    public function recoveryCode(Request $request){
       
       return $this->view('broker.login.recovery-code');
    }
}