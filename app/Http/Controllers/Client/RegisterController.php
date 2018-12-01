<?php 
namespace App\Http\Controllers\Client;

use Barryvdh\Form\CreatesForms;
use App\Http\Controllers\Controller;
use App\Services\SalesForce\SalesForceApiParameters;
use App\Services\SalesForce\ApiCall\AddClientApiCall;
use App\Entities\User; 
use App\Form\NewUserType;
use Illuminate\Http\Request;

class RegisterController extends Controller 
{
    use CreatesForms;

    public function signup(Request $request)
    {
        $newUser = new User();
   
        $form = $this->createForm(NewUserType::class, $newUser);
        
        $form->handleRequest($request);
        
        return $this->view(
            'client.register.signup',
            [   
                'form' => $form->createView()
            ]
        );
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