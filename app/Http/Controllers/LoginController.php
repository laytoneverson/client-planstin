<?php 
namespace App\Http\Controllers;

class LoginController extends Controller {

    public function initialize(){

        $this->view->errorMessage = session('error');
        $this->view->successMessage = session('success');

            $this->includes->body = 'includes.body-login';
            $this->includes->footer = 'includes.footer-login';

            //temporary.  get rid of this
            $this->includes->sidebar = 'includes.sidebar-company';
    }
    public function memberAction(){
        // if(!session('token') || !session('user.level')){
        //     session()->put('user.level', 'member');
        // }
        // $this->authorizeToken();
        return $this->view('login.member');
    }
    public function companyAction(){
        // if(!session('token') || !session('user.level')){
        //     session()->put('user.level', 'company');
        // }
        // $this->authorizeToken();
        return $this->view('login.company');
    }
    public function logout(){
        session()->forget('token');
        return \App\App::redirectToLogin()->with(['success' => 'Logout successful']);
    }

    public function forgotPasswordAction($type){
        return $this->view('login.'. $type .'.forgot');
    }
    public function recoveryCodeAction($type){
        return $this->view('login.'. $type .'.recovery-code');
    }
    public function registerAction($type){
        return $this->view('login.'. $type .'.register');
    }
    public function resetPasswordAction($type){
        return $this->view('login.'. $type .'.pass-reset');
    }

    //from saikat
    //admin portal
    public function wellDoneAction(){
        return $this->view('company.well-done');
    }
    public function dashboardAction(){
        return $this->view('company.dashboard');
    }
    public function companyHomeAction(){
        return $this->view('company.company');
    }
    public function servicesAction(){
        return $this->view('company.services');
    }
    public function employeesAction(){
        return $this->view('company.employees');
    }
    public function billingAction(){
        return $this->view('company.billing');
    }
    public function documentsAction(){
        return $this->view('company.documents');
    }
    public function settingsAction(){
        return $this->view('company.settings');
    }


    //emp portal
    public function empBaseHealth(){
        return $this->view('member.base-health-agree');
    }
    public function empBenefit(){
        return $this->view('member.emp-benefit');
    }
    public function empProfile(){
        return $this->view('member.emp-profile');
    }
    public function empDashboard(){
        return $this->view('member.emp-dashboard');
    }
    public function empDependents(){
        return $this->view('member.emp-dependents');
    }
    public function empEnroll(){
        return $this->view('member.emp-enroll');
    }
    public function empSettings(){
        return $this->view('member.emp-settings');
    }
    public function empEvent(){
        return $this->view('member.emp-event-submit');
    }

}