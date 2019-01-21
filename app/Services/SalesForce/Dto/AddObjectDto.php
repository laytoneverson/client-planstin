<?php
/**
 * File: AddObjectDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;


use App\Entities\AbstractSalesForceObjectEntity;
use App\Exceptions\SalesForce\SalesForceApiErrorMessageException;
use App\Utils\SalesForceDataExchangeTrait;

class AddObjectDto implements SalesForceDtoInterface
{
    use SalesForceDataExchangeTrait;

    /**
     * @var AbstractSalesForceObjectEntity
     */
    private $entity;

    private $returnData;

    /**
     * @var array
     */
    private $skipColumns = ['Id'];

    public function __construct(AbstractSalesForceObjectEntity $entity, $skipColumns = null)
    {
        $this->entity = $entity;
        if ($skipColumns) {
            $this->skipColumns = $skipColumns;
        }
    }

    public function toSfObject(): array
    {
        $data = $this->convertToSalesForceData($this->entity, $this->entity::getSfMapping(), $this->skipColumns);

        return $data;
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $this->returnData = \GuzzleHttp\json_decode($data);

        if (!$this->returnData->success) {
            throw new SalesForceApiErrorMessageException($this->returnData->errors);
        }

        $this->entity->setSfObjectId($this->returnData->id);

        return $this;
    }

    /**
     * @return AbstractSalesForceObjectEntity
     */
    public function getEntity(): AbstractSalesForceObjectEntity
    {
        return $this->entity;
    }

    public function getReturnData()
    {
        return $this->returnData;
    }
}
