<?php
/**
 * File: SalesForceRestApiConnection.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\ApiConnection;


use AbstractSalesForceApiCall;
use App\Exceptions\SalesForce\SalesForceApiCallErrorException;
use App\Services\SalesForce\SalesForceApiParameters;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

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
    protected $requestHeaders = [];

    /**
     * @var array
     */
    protected $queryParams = [];

    /**
     * @var array
     */
    protected $postParams = [];

    /**
     * @var string
     */
    protected $requestUrl;

    /**
     * @var string
     */
    protected $requestMethod;

    /**
     * @var array|string|null
     */
    protected $requestBody;

    public function __construct(HttpClient $httpClient, SalesForceApiParameters $apiParameters)
    {
        $this->apiParameters = $apiParameters;
        $this->httpClient = $httpClient;
    }

    /**
     * @param AbstractSalesForceApiCall $apiCall
     * @return mixed|void
     *
     * @throws SalesForceApiCallErrorException
     */
    public function executeApiCall(AbstractSalesForceApiCall $apiCall)
    {
        $opts = [];

        //Attach query string
        if (\count($this->queryParams)) {
            $opts['query'] = $this->queryParams;
        }

        if ($this->requestBody) {
            $bodyOpt = \is_array($this->requestBody)
                ? 'json'  //json encode
                : 'body'; //raw
            $opts[$bodyOpt] = $this->requestBody;
        }

        if (\count($this->requestHeaders)) {
            $opts['headers'] = $this->requestHeaders;
        }

        try {

            $this->httpClient->request(
                $this->requestMethod,
                $this->requestUrl,
                $opts
            );
        } catch (GuzzleException $exception) {
            throw new SalesForceApiCallErrorException($apiCall, $exception->getMessage(), $exception);
        }
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

    public function addQueryParameter($name, $value)
    {
        $this->queryParams[$name] = $value;
    }

    public function addPostParameter($name, $value)
    {
        $this->postParams[$name] = $value;
    }
}
