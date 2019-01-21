<?php
/**
 * File: UpdateObjectDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\AbstractSalesForceObjectEntity;
use App\Utils\SalesForceDataExchangeTrait;

class UpdateObjectDto implements SalesForceDtoInterface
{
    use SalesForceDataExchangeTrait;

    /**
     * @var AbstractSalesForceObjectEntity
     */
    private $entity;

    private $skipColumns = ['Id'];

    public function __construct(AbstractSalesForceObjectEntity $entity, $skipColumns = null)
    {
        if ($skipColumns) {
            $this->skipColumns = $skipColumns;
        }

        $this->entity = $entity;
    }

    /**
     * @return array
     */
    public function toSfObject(): array
    {
        return $this->convertToSalesForceData($this->entity, $this->entity::getSfMapping(), $this->skipColumns);
    }

    /**
     * @param string $data
     * @return SalesForceDtoInterface
     */
    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        return $this;
    }

    /**
     * @return AbstractSalesForceObjectEntity
     */
    public function getEntity()
    {
        return $this->entity;
    }

}
