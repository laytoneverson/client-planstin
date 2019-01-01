<?php
/**
 * File: DashboardController.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    public function initialize(){

    }

    public function index(){
    
        return $this->view('company.dashboard');
    }
}
