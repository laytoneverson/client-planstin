<?php
/**
 * File: EmployeeController.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Http\Controllers\Company;


class EmployeeController extends BaseController {

    public function addEmployeeAction(){
        return $this->view('company.employee.add-employee');
    }
    public function viewEmployeesAction(){
        return $this->view('company.employee.view-employees');
    }
}
