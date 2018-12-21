<?php
/**
 * File: SOQLQuerySelectObjectRowsDto.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\AbstractSalesForceObjectEntity;

class SOQLQuerySelectObjectRowsDto extends SOQLQueryDto
{
    public function __construct(
        string $objectFqn,
        string $return = self::RETURN_OBJECT,
        string $whereClause = null
    ) {

        if (!\is_subclass_of($objectFqn, AbstractSalesForceObjectEntity::class)) {
             throw new \LogicException("$objectFqn is not an AbstractSalesForceObjectEntity");
        }

        /* $objectFQN is a subclass of an AbstractSalesForceObjectEntity and therefore implements
         * the AbstractSalesForceObjectEntity::getSfMapping() method as well as the
         * AbstractSalesForceObjectEntity::getSfObjectApiName() method.
         */
        $params = [
            \implode(',', \array_keys($objectFqn::getSfMapping())),
            $objectFqn::getSfObjectApiName(),
        ];

        if ($whereClause) {
            $query = self::QUERY_SELECT_WHERE;
            $params[] = $whereClause;
        } else {
            $query = self::QUERY_SELECT_BASIC;
        }

        parent::__construct($query, $params, $return);
    }
}
