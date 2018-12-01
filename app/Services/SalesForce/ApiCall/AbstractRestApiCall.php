<?php
namespace App\Services\SalesForce\ApiCall;

namespace App\Services\SalesForce\ApiCall;

use App\Exceptions\SalesForce\SalesForceApiException;
use App\Services\SalesForce\Dto\SalesForceDtoInterface;
use App\Services\SalesForce\SalesForceApiParameters;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Allows the application to interact with a SaleForce api via this single class. When this class is extended
 * a SalesForceApiConnectionInterface is type hinted to the class and inject by the service manager.
 *
 * Class AbstractSalesForceApiCall
 */
abstract class AbstractRestApiCall implements SalesForceApiCallInterface
{
    public const HTTP_METHOD_GET = 'GET';
    public const HTTP_METHOD_POST = 'POST';
    public const HTTP_METHOD_PUT = 'PUT';
    public const HTTP_METHOD_DELETE = 'DELETE';

    public const REQUEST_BODY_RAW = 'raw';
    public const REQUEST_BODY_JSON = 'json';
    public const REQUEST_BODY_FORM = 'form';

    public const CONTENT_TYPE_JSON = 'application/json';
    public const CONTENT_TYPE_FORM = 'application/x-www-form-urlencoded';

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var SalesForceApiParameters
     */
    protected $apiParameters;

    /**
     * @var SalesForceDtoInterface
     */
    protected $data;

    /**
     * @var string
     */
    protected $requestMethod = self::HTTP_METHOD_GET;

    /**
     * @var string
     */
    protected $requestUrl;

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
    protected $requestBodyParams = [];

    /**
     * @var mixed
     */
    protected $requestBodyRaw;

    protected $requestBodyType = self::REQUEST_BODY_FORM;

    /**
     * Prepares the api request. Called during execute.
     */
    abstract protected function prepareRequest(): void;

    /**
     * Returns the API calls URI
     *
     * @return string
     */
    abstract protected function getRequestUrl(): string;

    /**
     * Returns the DTO FQN to verify that the correct DTO has
     * been set for the api call being made.
     *
     * @return string
     */
    abstract protected function getDtoObjectType(): string;

    /**
     * AbstractSalesForceApiCall constructor.
     *
     * @param SalesForceApiParameters $apiParameters
     * @param HttpClient $httpClient
     */
    public function __construct(SalesForceApiParameters $apiParameters, HttpClient $httpClient)
    {
        $this->apiParameters = $apiParameters;
        $this->httpClient = $httpClient;
    }

    /**
     * @return bool
     * @throws SalesForceApiException
     */
    public function execute(): bool
    {
        $this->prepareRequest();

        $opts = [];

        //Attach query string
        if (\count($this->queryParams)) {
            $opts['query'] = $this->queryParams;
        }

        //Set request body
        switch ($this->requestBodyType) {
            case self::REQUEST_BODY_FORM:
                $opts['form_params'] = $this->requestBodyParams;
                break;
            case self::REQUEST_BODY_RAW:
                $opts['body'] = $this->requestBodyRaw;
                break;
            case self::REQUEST_BODY_JSON:
                $opts['json'] = $this->requestBodyParams;
                break;
        }

        if (\count($this->requestHeaders)) {
            $opts['headers'] = $this->requestHeaders;
        }

        try {

            $result = $this->httpClient->request(
                $this->requestMethod,
                $this->getRequestUrl(),
                $opts
            );

        } catch (GuzzleException $exception) {
            throw new SalesForceApiException($this, $exception->getMessage(), $exception->getCode(), $exception);
        }

        $this->handleResult($result);

        return true;
    }

    public function setData(SalesForceDtoInterface $dto): SalesForceApiCallInterface
    {
        $this->data = $dto;

        return $this;
    }

    protected function handleResult(ResponseInterface $result): void
    {
        $this->data->fromSfObject($result->getBody());
    }

    /**
     * @param string $requestHeader
     * @return AbstractRestApiCall
     */
    protected function addRequestHeader(string $requestHeader): self
    {
        $this->requestHeaders[] = $requestHeader;

        return $this;
    }

    /**
     * @param mixed $queryParam
     * @return AbstractRestApiCall
     */
    protected function addQueryParam($queryParam): self
    {
        $this->queryParams[] = $queryParam;

        return $this;
    }

    /**
     * @param array $requestBodyParams
     * @return AbstractRestApiCall
     */
    protected function setRequestBodyParams(array $requestBodyParams): self
    {
        $this->requestBodyParams = $requestBodyParams;

        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return AbstractRestApiCall
     */
    protected function addHeader(string $name, string $value): self
    {
        $this->requestHeaders[$name] = $value;

        return $this;
    }

    /**
     * Includes a stored token for api auth in the request.
     */
    protected function authorizeWithToken(): self
    {
        //@TODO: Add Token Header for requests...
        return $this;
    }
}
