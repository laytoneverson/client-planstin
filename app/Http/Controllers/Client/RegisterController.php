<?php 
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller; 

class RegisterController extends Controller {

    public function signup(){
        
        return $this->view('client.register.signup');
    }
    public function profile(){
        echo 'profile works';
    }
    public function services(){
        echo 'services works';
    }
    public function agreement(){
        echo 'agreement works';
    }
    public function employees(){
        echo 'employees works';
    }
}