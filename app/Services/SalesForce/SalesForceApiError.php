<?php
/**
 * File: SalesForceApiError.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SalesForceApiError
{
    private $apiResponse;

    private $apiRequest;

    private $responseBody;

    private $requestBody;

    public function __construct(Response $response, Request $request)
    {
        $this->apiResponse = $response;
        $this->apiRequest = $request;

        $this->responseBody = \GuzzleHttp\json_decode($response->getBody());
        $this->requestBody = (string)$request->getBody();
    }

    public function getError()
    {
        $message = '';
        if (\is_array($this->responseBody)) {
            foreach ($this->responseBody as $responseItem) {
                $message .= $responseItem->message . "\n";
            }
        } else {
            if (isset($this->responseBody->message)) {
                $message = $this->responseBody->message;
            }
        }

        return $message;
    }

    public function getErrorCode()
    {
        return $this->responseBody->errorCode;
    }


    public function getHttpResponseCode()
    {
        return $this->apiResponse->getStatusCode();
    }

    /**
     * @return Response
     */
    public function getApiResponse()
    {
        return $this->apiResponse;
    }
}
