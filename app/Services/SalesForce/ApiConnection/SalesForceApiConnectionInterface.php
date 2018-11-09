<?php
/**
 * File: SalesForceApiConnectionInterface.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\ApiConnection;

use AbstractSalesForceApiCall;

interface SalesForceApiConnectionInterface
{
    public function executeApiCall(AbstractSalesForceApiCall $apiCall);
}
