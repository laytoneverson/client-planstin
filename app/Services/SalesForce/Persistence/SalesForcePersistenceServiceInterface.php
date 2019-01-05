<?php
/**
 * File: SalesForcePersistenceServiceInterface.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Persistence;




use App\Entities\AbstractSalesForceObjectEntity;

interface SalesForcePersistenceServiceInterface
{
    public function updateObject(AbstractSalesForceObjectEntity $entity);

    public function addObject(AbstractSalesForceObjectEntity $entity);

    public function getSalesForceObjectData(AbstractSalesForceObjectEntity $entity);
}
