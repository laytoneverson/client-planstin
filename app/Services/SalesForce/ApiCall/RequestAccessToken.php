<?php

/**
 * File: RequestAccessToken.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\ApiCall;

use App\Services\SalesForce\Dto\RequestAccessTokenDto;
use App\Services\SalesForce\SalesForceTokenService;

class RequestAccessToken extends AbstractRestApiCall
{
    protected function getRequestUrl(): string
    {
        return $this->apiParameters->getAuthEndpoint() . SalesForceTokenService::TOKEN_URI;
    }

    protected function getDtoObjectType(): string
    {
        return RequestAccessTokenDto::class;
    }

    protected function prepareRequest(): void
    {
        $this->requestBodyType = self::REQUEST_BODY_FORM;
        $this->requestMethod = self::HTTP_METHOD_POST;
        $this->requestBodyParams = $this->data->toSfObject();
    }
}
