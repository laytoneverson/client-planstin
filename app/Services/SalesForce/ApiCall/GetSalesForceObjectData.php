<?php
/**
 * File: GetSalesForceObjectData.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiCall;


use App\Services\SalesForce\Dto\GetSalesForceObjectDataDto;

class GetSalesForceObjectData extends AbstractRestApiCall
{
    protected function prepareRequest(): void
    {
        $this->requestMethod = self::HTTP_METHOD_GET;

    }

    protected function getRequestUrl(): string
    {
        // TODO: Implement getRequestUrl() method.
    }

    protected function getDtoObjectType(): string
    {
        return GetSalesForceObjectDataDto::class;
    }

}
