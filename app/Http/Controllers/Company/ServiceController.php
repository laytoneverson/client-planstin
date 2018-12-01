<?php
/**
 * File: ServiceController.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Http\Controllers\Company;


class ServiceController extends BaseController {

    public function chooseBenefitsAction(){
        return $this->view('company.service.choose-benefits');
    }

    public function chooseServicesAction(){
        return $this->view('company.service.choose-services');
    }
    public function editServiceAction(){
        return $this->view('company.service.edit-service');
    }
}
