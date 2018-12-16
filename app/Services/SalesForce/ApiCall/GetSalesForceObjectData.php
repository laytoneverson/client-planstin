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
        $this->authorizeWithToken();
    }

    protected function getRequestUrl(): string
    {
        $requestData = $this->data->toSfObject();

        return \sprintf('%s/%s',
            $this->getObjectBaseUrl($requestData['objectApiName']),
            $requestData['objectId']
        );
    }

    protected function getDtoObjectType(): string
    {
        return GetSalesForceObjectDataDto::class;
    }

}
