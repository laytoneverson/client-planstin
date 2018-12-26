<?php 
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request; 

class LoginController extends Controller {

    public function login(Request $request){
        return $this->view('member.login.login');
    }
    public function forgotPassword(Request $request){
        
        return $this->view('member.login.forgot');
    }
    public function resetPassword(Request $request){
        
        return $this->view('member.login.pass-reset');
    }
    public function recoveryCode(Request $request){
       
       return $this->view('member.login.recovery-code');
    }
}