<?php
/**
 * File: SalesForceApiCallInterface.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiCall;


use App\Exceptions\SalesForce\SalesForceApiException;
use App\Services\SalesForce\Dto\SalesForceDtoInterface;

interface SalesForceApiCallInterface
{
    /**
     * This function should prepare the request for the applicable api connection (REST, soap, etc) and call
     * the SalesForceApiConnectionInterface::executeApiCall(AbstractSalesForceApiCall $call) function, passing
     * itself as a parameter. Extend this function to manipulate data before sending it to the connection class.
     *
     * @return bool
     * @throws SalesForceApiException;
     */
    public function execute(): bool;

    public function setData(SalesForceDtoInterface $dto): self;
}
