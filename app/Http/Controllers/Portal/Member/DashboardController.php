<?php 
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller {

    public function home(Request $request){

        return $this->view('member.dashboard.home');
    }
    
    public function employer(Request $request){

        return $this->view('member.dashboard.employer');
    }
    public function benefits(Request $request){

        return $this->view('member.dashboard.benefits');
    }
    public function dependents(Request $request){

        return $this->view('member.dashboard.dependents');
    }
    public function submitEvent(Request $request){

        return $this->view('member.dashboard.submit-event');
    }
    public function agreement(Request $request){

        return $this->view('member.dashboard.agreement');
    }
    public function settings(Request $request){

        return $this->view('member.dashboard.settings');
    }
} 
