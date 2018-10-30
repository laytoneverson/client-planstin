<?php 
namespace App\Http\Controllers;

use App\Services\Salesforce;

class Oauth2 extends Controller {
    public function initialize(){
        
    }
    public function request(){
        $salesforce = new Salesforce;

        header('Location: ' . $salesforce->getAuthUrl());
        die();
    }
    public function success(){
        if(!$this->request->has('code')){
           return $this->error('No Code Parameter');
        }
        
        $salesforce = new Salesforce;

        $tokenData = $salesforce->requestAccessToken( $this->request->get('code') );

        if(!empty($tokenData['access_token'])){
            \App\App::setSessionToken('salesforce', $tokenData);

            return redirect('/employee/dashboard')->with(['success' => 'Successfully logged in']);
        }

        return redirect('/login')->with(['error' => 'Error authenticating: ' . $tokenData['error_description']]);
    }
}