<?php
/**
 * File: GetObjectMetadataDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;


class GetObjectMetadataDto implements SalesForceDtoInterface
{
    protected $objectName;

    protected $returnData;

    protected $describeObject = false;

    public function __construct($objectName = null)
    {
        if (!empty($objectName)) {
            $this->objectName = $objectName;
        }
    }

    public function toSfObject(): array
    {
        return ($this->objectName)
            ? ['objectName' => $this->objectName]
            : [];
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $this->returnData = \GuzzleHttp\json_decode($data);

        return $this;
    }

    public function getReturnData()
    {
        return $this->returnData;
    }

    public function setDescribeObject($describe = true)
    {
        $this->describeObject = $describe;
    }

    /**
     * @return bool
     */
    public function isDescribeObject(): bool
    {
        return $this->describeObject;
    }
}
