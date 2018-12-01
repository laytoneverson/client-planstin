<?php
/**
 * File: RegisterController.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Http\Controllers\Company;


class RegisterController extends BaseController {

    public function createProfileAction(){
        return $this->view('company.register.create-profile');
    }
    public function baseHealthAgreementAction(){
        return $this->view('company.register.base-health-agree');
    }

    public function payrollAgreementAction(){
        return $this->view('company.register.payroll-agree');
    }
}
