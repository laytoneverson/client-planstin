<?php
/**
 * File: RemoveObjectDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;


use App\Entities\AbstractSalesForceObjectEntity;

class RemoveObjectDto implements SalesForceDtoInterface
{

    /**
     * @var AbstractSalesForceObjectEntity
     */
    private $objectEntity;

    public function __construct(AbstractSalesForceObjectEntity $objectEntity)
    {
        $this->objectEntity = $objectEntity;
    }

    public function toSfObject(): array
    {
        return [];
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        return $this;
    }

    /**
     * @return AbstractSalesForceObjectEntity
     */
    public function getObjectEntity(): AbstractSalesForceObjectEntity
    {
        return $this->objectEntity;
    }
}
