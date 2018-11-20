<?php
namespace App\Services\SalesForce\ApiCall;

use App\Services\SalesForce\Dto\RequestAccessTokenDto;
use App\Services\SalesForce\SalesForceTokenService;

/**
 * File: RequestAccessToken.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\ApiCall;

use App\Services\SalesForce\Dto\RequestAccessTokenDto;
use App\Services\SalesForce\SalesForceTokenService;

class RequestAccessToken extends AbstractSalesForceApiCall
{
    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_POST;
    }

    public function getCallUri(): string
    {
        return $this->apiConfig->getApiEndpoint() . SalesForceTokenService::AUTH_URI;
    }

    protected function getDtoObjectType(): string
    {
        return RequestAccessTokenDto::class;
    }
}
