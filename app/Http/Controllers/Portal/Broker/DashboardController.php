<?php 
namespace App\Http\Controllers\Broker;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller {

    public function home(Request $request){

        return $this->view('broker.dashboard.home');
    }
    
    public function profile(Request $request){

        return $this->view('broker.dashboard.profile');
    }
    public function directDeposit(Request $request){

        return $this->view('broker.dashboard.direct-deposit');
    }
    public function directDepositEdit(Request $request){

        return $this->view('broker.dashboard.direct-deposit-edit');
    }
    public function clients(Request $request){

        return $this->view('broker.dashboard.clients');
    }
    public function statements(Request $request){

        return $this->view('broker.dashboard.statements');
    }
    public function documents(Request $request){

        return $this->view('broker.dashboard.documents');
    }
    public function settings(Request $request){

        return $this->view('broker.dashboard.settings');
    }
} 
