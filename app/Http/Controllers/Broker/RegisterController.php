<?php 
namespace App\Http\Controllers\Broker;

use App\Exceptions\InvalidPasswordException;
use App\Exceptions\UserAlreadyExistsException;
use Barryvdh\Form\CreatesForms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function signup(Request $request){
        

        return $this->view('broker.register.signup');
    }

    public function contracting(Request $request){

        return $this->view('broker.register.contracting');
    }

    public function agreement(Request $request){

        return $this->view('broker.register.agreement');
    }
}