<?php
/**
 * File: SalesForceRestApiConnection.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\ApiConnection;


use AbstractSalesForceApiCall;
use App\Services\SalesForce\SalesForceApiParameters;
use GuzzleHttp\Client as HttpClient;

class SalesForceRestApiConnection implements
    SalesForceApiConnectionInterface
{
    /**
     * @var SalesForceApiParameters
     */
    protected $apiParameters;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $headers = [];

    public function __construct(HttpClient $httpClient, SalesForceApiParameters $apiParameters)
    {
        $this->apiParameters = $apiParameters;
        $this->httpClient = $httpClient;
    }

    public function executeApiCall(AbstractSalesForceApiCall $apiCall)
    {

    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @param mixed $header
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }
}
