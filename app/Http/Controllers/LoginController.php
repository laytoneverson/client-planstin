<?php 
namespace App\Http\Controllers;

class LoginController extends Controller {

    public function initialize(){

        $this->view->errorMessage = session('error');
        $this->view->successMessage = session('success');

        $this->includes->body = 'includes.body-login';
        $this->includes->footer = 'includes.footer-login';
    }
    public function memberAction(){
        if(!session('token') || !session('user.level')){
            session()->put('user.level', 'member');
        }
        $this->authorizeToken();
        return $this->view('login.member');
    }
    public function companyAction(){
        if(!session('token') || !session('user.level')){
            session()->put('user.level', 'company');
        }
        $this->authorizeToken();
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

    public function createProfile(){
        return $this->view('account.create-profile');
    }
    public function companyBenefit(){
        return $this->view('account.choose-company-benefit');
    }
    public function yourServices(){
        return $this->view('account.your-services');
    }
    public function baseHealth(){
        return $this->view('account.base-health-agree');
    }
    public function payrollAgree(){
        return $this->view('account.payroll-agree');
    }
    public function serviceAdded(){
            return $this->view('account.service-added');
    }
    public function addEmployee(){
            return $this->view('account.add-employees');
    }
    public function reviewEmployee(){
            return $this->view('account.review-employees');
    }
    public function wellDone(){
            return $this->view('account.well-done');
    }
    public function dashboard(){
                return $this->view('account.dashboard');
    }
    public function company(){
                return $this->view('account.company');
    }
    public function services(){
                return $this->view('account.services');
    }
    public function employees(){
                return $this->view('account.employees');
    }
    public function billing(){
            return $this->view('account.billing');
    }
    public function documents(){
            return $this->view('account.documents');
    }
    public function settings(){
            return $this->view('account.settings');
    }


    //emp portal

    public function empAccount(){
        return $this->view('login.emp-account');
    }
    public function empForgotPassword($type){
        return $this->view('login.'. $type .'.empForgot');
    }
    public function empPassReset($type){
        return $this->view('login.'. $type .'.emp-pass-reset');
    }
    public function empRecovery($type){
        return $this->view('login.'. $type .'.emp-recovery-code');
    }
    public function empRegister($type){
        return $this->view('login.'. $type .'.emp-register');
    }
    public function empBaseHealth(){
        return $this->view('account.employee.base-health-agree');
    }
    public function empBenefit(){
        return $this->view('account.employee.emp-benefit');
    }
    public function empProfile(){
        return $this->view('account.employee.emp-profile');
    }
    public function empDashboard(){
        return $this->view('account.employee.emp-dashboard');
    }
    public function empDependents(){
        return $this->view('account.employee.emp-dependents');
    }
    public function empEnroll(){
        return $this->view('account.employee.emp-enroll');
    }
    public function empSettings(){
        return $this->view('account.employee.emp-settings');
    }
    public function empEvent(){
        return $this->view('account.employee.emp-event-submit');
    }

}