<?php
namespace App\Services\SalesForce\ApiCall;

namespace App\Services\SalesForce\ApiCall;

use App\Services\SalesForce\ApiConnection\SalesForceApiConnectionInterface;
use App\Services\SalesForce\Dto\SalesForceDtoInterface;
use App\Services\SalesForce\SalesForceApiParameters;
use App\Services\SalesForce\SalesForceService;

/**
 * Allows the application to interact with a SaleForce api via this single class. When this class is extended
 * a SalesForceApiConnectionInterface is type hinted to the class and inject by the service manager.
 *
 * Class AbstractSalesForceApiCall
 */
abstract class AbstractSalesForceApiCall
{
    public const HTTP_METHOD_GET = 'GET';
    public const HTTP_METHOD_POST = 'POST';
    public const HTTP_METHOD_PUT = 'PUT';
    public const HTTP_METHOD_DELETE = 'DELETE';

    /**
     * @var SalesForceApiConnectionInterface
     */
    protected $salesForceApi;

    /**
     * @var SalesForceApiParameters
     */
    protected $apiConfig;

    /**
     * @var SalesForceDtoInterface
     */
    protected $data;

    /**
     * AbstractSalesForceApiCall constructor.
     *
     * @param SalesForceApiParameters $apiConfig
     * @param SalesForceService $salesForce
     */
    public function __construct(SalesForceApiParameters $apiConfig, SalesForceApiConnectionInterface $salesForceApi)
    {
        $this->apiConfig = $apiConfig;
        $this->salesForceApi = $salesForceApi;
    }

    public function setData(SalesForceDtoInterface $dto): self
    {
        $this->data = $dto;

        return $this;
    }

    /**
     * This function should prepare the request for the applicable api connection (REST, soap, etc) and call
     * the SalesForceApiConnectionInterface::executeApiCall(AbstractSalesForceApiCall $call) function, passing
     * itself as a parameter. Extend this function to manipulate data before sending it to the connection class.
     */
    public function execute(): void
    {
        $result = $this->salesForceApi->executeApiCall($this);
        $this->data->fromSfObject($result);
    }

    /**
     * Return HTTP Method
     *
     * @return string
     */
    abstract public function getHttpMethod(): string;

    /**
     * Returns the API calls URI
     *
     * @return string
     */
    abstract public function getCallUri(): string;

    /**
     * Returns the DTO FQN to verify that the correct DTO has
     * been set for the api call being made.
     *
     * @return string
     */
    abstract protected function getDtoObjectType(): string;
}
