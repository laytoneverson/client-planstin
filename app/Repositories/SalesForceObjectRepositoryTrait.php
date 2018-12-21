<?php
/**
 * File: SalesForceObjectRepositoryTrait.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

trait SalesForceObjectRepositoryTrait
{
    public function findBySalesForceObjectId($objectId)
    {
        return $this->findOneBy([
            'sfObjectId' => $objectId
        ]);
    }
}
