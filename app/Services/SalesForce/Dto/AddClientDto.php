<?php
/**
 * File: AddClientDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\GroupClient;
use App\Exceptions\SalesForce\SalesForceApiErrorMessageException;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Class AddClientDto
 * @deprecated use the AddObject api call
 * @package App\Services\SalesForce\Dto
 */
class AddClientDto implements SalesForceDtoInterface
{
    /**
     * @var GroupClient
     */
    protected $client;

    protected $returnData;

    public function __construct(GroupClient $client)
    {
        $this->client = $client;
    }

    public function toSfObject(): array
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        $arrayMap = $this->client::getSfMapping();

        $return = [];
        foreach ($arrayMap as $sf => $localPath) {
            $return[$sf] = $accessor->getValue($this->client, $localPath);
        }

        return $return;
    }

    /**
     * @param string $data
     * @return SalesForceDtoInterface
     * @throws SalesForceApiErrorMessageException
     */
    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $this->returnData = \GuzzleHttp\json_decode($data);

        if (!$this->returnData->success) {
            throw new SalesForceApiErrorMessageException($this->returnData->errors);
        }

        $this->client->setSfObjectId($this->returnData->id);

        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getReturnData(): \stdClass
    {
        return $this->returnData;
    }
}
