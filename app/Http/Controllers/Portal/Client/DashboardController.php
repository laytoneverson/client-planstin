<?php
/**
 * File: DashboardController.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Http\Controllers\Portal\Client;

use App\Entities\GroupClient;
use App\Http\Controllers\Controller;
use App\Services\UserAccountService;

class DashboardController extends Controller {

    public function initialize(){

    }

    public function home(){
        // Returns a redirect to the current signup step
        if (true !== $isSetup = $this->checkSetupComplete()) {
            return $isSetup;
        }

        return $this->view('company.dashboard');
    }

    /**
     * Move this to middleware
     */
    private function checkSetupComplete()
    {
        /** @var UserAccountService $userAccountService */
        $userAccountService = app(UserAccountService::class);

        $user = $userAccountService->getCurrentUser();

        if (!$groupClient = $user->getGroupClient()) {
            return \redirect()->route('register.client.profile');
        }

        $setupStep = $groupClient->getSignupStep();

        switch ($setupStep) {
            case GroupClient::ENROLL_STEP_COMPLETE:
                return true;
            case GroupClient::ENROLL_STEP_PROFILE:
                return \redirect()->route('register.client.profile');
            case GroupClient::ENROLL_STEP_SERVICES:
                return \redirect()->route('register.client.services');
            case GroupClient::ENROLL_STEP_AGREEMENT:
                return \redirect()->route('register.client.agreements');
            case GroupClient::ENROLL_STEP_BILLING:
                return \redirect()->route('register.client.billing');
        }

    }
}
