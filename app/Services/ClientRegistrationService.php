<?php
/**
 * File: ClientRegistrationService.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services;

use App\Entities\Client;
use App\Entities\User;

/**
 * Class ClientRegistrationService contains business logic to manage new business
 * client registrations.
 *
 * @package App\Services
 */
class ClientRegistrationService
{

    public function __construct()
    {

    }

    public function prepareNewClient(User $owningUser)
    {
        $client = new Client();

        $client
            ->addAdminUser($owningUser)
            ->setSignupStep(Client::ENROLL_STEP_PROFILE);

        $owningUser->setAdminOf($client);

        return $client;
    }
}
