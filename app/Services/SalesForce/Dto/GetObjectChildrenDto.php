<?php
/**
 * File: GetObjectChildrenDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;


use App\Entities\AbstractSalesForceObjectEntity;
use App\Entities\SalesForceChildRelationship;
use stdClass;

class GetObjectChildrenDto implements SalesForceDtoInterface
{
    /**
     * @var AbstractSalesForceObjectEntity
     */
    private $entity;

    /**
     * @var SalesForceChildRelationship
     */
    private $relationship;

    /**
     * @var stdClass
     */
    private $returnData;

    public function __construct(AbstractSalesForceObjectEntity $entity, SalesForceChildRelationship $relationship)
    {
        $this->entity = $entity;
        $this->relationship = $relationship;
    }

    /**
     * @inheritDoc
     */
    public function toSfObject(): array
    {
        // TODO: Implement toSfObject() method.
    }

    /**
     * @inheritDoc
     */
    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $this->returnData = \GuzzleHttp\json_decode($data);

        return $this;
    }

    /**
     * @return AbstractSalesForceObjectEntity
     */
    public function getEntity(): AbstractSalesForceObjectEntity
    {
        return $this->entity;
    }

    /**
     * @return SalesForceChildRelationship
     */
    public function getRelationship(): SalesForceChildRelationship
    {
        return $this->relationship;
    }

    /**
     * @return object
     */
    public function getReturnData(): stdClass
    {
        return $this->returnData;
    }
}
