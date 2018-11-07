<?php

use App\Services\SalesForce\Dto\SalesForceDtoInterface;
use App\Services\SalesForce\SalesForceApiParameters;
use App\Services\SalesForce\SalesForceService;

abstract class AbstractSalesForceApiCall
{
    /**
     * @var SalesForceService
     */
    protected $salesForce;

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
    public function __construct(SalesForceApiParameters $apiConfig, SalesForceService $salesForce)
    {
        $this->apiConfig = $apiConfig;
        $this->salesForce = $salesForce;
    }

    /**
     * @return SalesForceService
     */
    public function getSalesForce(): SalesForceService
    {
        return $this->salesForce;
    }

    public function setData(SalesForceDtoInterface $dto)
    {
        $this->data = $dto;
    }

    public function execute()
    {
        /* TODO:
         *   1. Take a DTO, grab the data from it
         *   2. Format it from the request
         *   3. Send it through to the SalesForce
         */
    }

    /**
     * Return HTTP Method
     *
     * @return string
     */
    abstract protected function getHttpMethod(): string;

    /**
     * Returns the API calls URI
     *
     * @return string
     */
    abstract protected function getCallUri(): string;

    /**
     * Returns the DTO FQN to verify that the correct DTO has
     * been set for the api call being made.
     *
     * @return string
     */
    abstract protected function getDtoObjectType(): string;
}
