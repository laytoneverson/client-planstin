<?php
/**
 * File: SOQLQueryDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;

class SOQLQueryDto implements SalesForceDtoInterface
{
    public const RETURN_OBJECT = 'object';
    public const RETURN_ASSOC = 'array';

    public const QUERY_SELECT_BASIC = 'SELECT %s FROM %s';
    public const QUERY_SELECT_WHERE = 'SELECT %s FROM %s WHERE %s';

    protected $query;

    protected $returnType;

    protected $queryParams = [];

    protected $returnData;

    protected $whereClause = null;

    public function __construct($query = '', $params = [], $return = self::RETURN_OBJECT)
    {
        $this->query = $query;
        $this->returnType = $return;
        $this->queryParams = $params;
    }

    public function toSfObject(): array
    {
        $query = (\count($this->queryParams) !== 0)
            ? \vsprintf($this->query, $this->queryParams)
            : $this->query;

        return ['q' => $query];
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $returnArray = $this->returnType === self::RETURN_ASSOC;

        $this->returnData = \GuzzleHttp\json_decode($data, $returnArray);

        return $this;
    }

    public function getReturnData()
    {
        return $this->returnData;
    }
}
