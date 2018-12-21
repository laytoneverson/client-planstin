<?php
/**
 * File: GetSalesForceObjectDataDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\AbstractSalesForceObjectEntity;
use Symfony\Component\PropertyAccess\PropertyAccess;

class GetSalesForceObjectDataDto implements SalesForceDtoInterface
{
    /**
     * @var AbstractSalesForceObjectEntity
     */
    private $salesForceObjectEntity;

    public function __construct(AbstractSalesForceObjectEntity $salesForceObjectEntity)
    {
        $this->salesForceObjectEntity = $salesForceObjectEntity;
    }

    public function toSfObject(): array
    {
        return [
            'objectApiName' => $this->salesForceObjectEntity->getSfObjectApiName(),
            'objectId' => $this->salesForceObjectEntity->getSfObjectId(),
        ];
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $dataMap = $this->salesForceObjectEntity->getSfMapping();
        $propertyAccessor = PropertyAccess::createPropertyAccessor();
        $data = \GuzzleHttp\json_decode($data);

        foreach($dataMap as $sfProperty => $localProperty) {

            $propertyAccessor->setValue(
                $this->salesForceObjectEntity,
                $localProperty,
                $data->$sfProperty
            );

        }

        return $this;
    }

    /**
     * @return AbstractSalesForceObjectEntity
     */
    public function getSalesForceObjectEntity(): AbstractSalesForceObjectEntity
    {
        return $this->salesForceObjectEntity;
    }
}
