<?php
/**
 * File: GetSalesForceObjectDataDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\AbstractSalesForceObjectEntity;
use stdClass;
use Symfony\Component\PropertyAccess\PropertyAccess;

class GetSalesForceObjectByIdDto implements SalesForceDtoInterface
{
    /** @var string */
    private $objectApiName;

    /** @var string */
    private $objectId;

    /**
     * @var stdClass
     */
    private $returnData;

    public function __construct(string $entityClass, string $objectId)
    {
        $this->objectApiName = $entityClass::getSfObjectApiName();
        $this->objectId = $objectId;
    }

    public function toSfObject(): array
    {
        return [
            'objectApiName' => $this->objectApiName,
            'objectId' => $this->objectId,
        ];
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $this->returnData = \GuzzleHttp\json_decode($data);

        return $this;
    }

    /**
     * @return stdClass
     */
    public function getData(): stdClass
    {
        return $this->returnData;
    }
}
