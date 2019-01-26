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
    public function updateObject(AbstractSalesForceObjectEntity $entity, $skipColumns = null);

    public function addObject(AbstractSalesForceObjectEntity $entity, $skipColumns = []);

    public function getSalesForceObjectData(AbstractSalesForceObjectEntity $entity);

    public function getAllObjectRecords($entityClass, $whereClause = null);

    public function syncAllObjectsOfType($entityClass);

    public function syncChildrenOfObject(AbstractSalesForceObjectEntity $entity, array $childrenClasses = []);

    public function getObjectDataBySalesfoceId($entityClass, $sfObjectId);
}
