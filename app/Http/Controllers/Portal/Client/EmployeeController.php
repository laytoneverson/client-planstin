<?php
/**
 * File: EmployeeController.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

class EmployeeController extends Controller {

    public function addEmployeeAction(){
        return $this->view('company.employee.add-employee');
    }
    public function viewEmployeesAction(){
        return $this->view('company.employee.view-employees');
    }
}
