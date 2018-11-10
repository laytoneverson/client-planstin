<?php
/**
 * File: SalesForceApiConnectionInterface.php
 * Planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiConnection;

use AbstractSalesForceApiCall;
use App\Exceptions\SalesForce\SalesForceApiCallErrorException;

interface SalesForceApiConnectionInterface
{
    /**
     * Returns result of api call
     *
     * @param AbstractSalesForceApiCall $apiCall
     * @return mixed
     *
     * @throws SalesForceApiCallErrorException
     */
    public function executeApiCall(AbstractSalesForceApiCall $apiCall);
}
