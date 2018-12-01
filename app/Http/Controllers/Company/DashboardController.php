<?php
/**
 * File: DashboardController.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Http\Controllers\Company;

class DashboardController extends BaseController {

    public function initialize(){

    }

    public function indexAction(){
    
        return $this->view('company.dashboard');
    }
}
