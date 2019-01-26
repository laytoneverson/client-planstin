<?php
/**
 * File: GenericPersistenceService.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Persistence;

use App\Entities\AbstractSalesForceObjectEntity;
use App\Entities\SalesForceChildRelationship;
use App\Services\SalesForce\ApiCall\AddObject;
use App\Services\SalesForce\ApiCall\GetObjectChildren;
use App\Services\SalesForce\ApiCall\GetSalesForceObjectData;
use App\Services\SalesForce\ApiCall\RemoveObject;
use App\Services\SalesForce\ApiCall\SOQLQuery;
use App\Services\SalesForce\ApiCall\UpdateObject;
use App\Services\SalesForce\Dto\AddObjectDto;
use App\Services\SalesForce\Dto\GetObjectChildrenDto;
use App\Services\SalesForce\Dto\GetSalesForceObjectByIdDto;
use App\Services\SalesForce\Dto\GetSalesForceObjectDataDto;
use App\Services\SalesForce\Dto\SOQLQueryDto;
use App\Services\SalesForce\Dto\SOQLQuerySelectObjectRowsDto;
use App\Services\SalesForce\Dto\UpdateObjectDto;
use App\Utils\SalesForceDataExchangeTrait;
use App\Utils\UsesEntityManagerTrait;
use Doctrine\ORM\EntityManagerInterface;

class GenericPersistenceService implements SalesForcePersistenceServiceInterface
{
    use UsesEntityManagerTrait, SalesForceDataExchangeTrait;

    /**
     * @var AddObject
     */
    protected $addObject;

    /**
     * @var RemoveObject
     */
    protected $removeObject;

    /**
     * @var UpdateObject
     */
    protected $updateObject;

    /**
     * @var GetSalesForceObjectData
     */
    protected $getObject;

    /**
     * @var SOQLQuery
     */
    protected $SOQLQuery;

    /**
     * @var GetObjectChildren
     */
    protected $getObjectChildren;

    public function updateObject(AbstractSalesForceObjectEntity $entity, $skipColumns = [])
    {
        $dto = new UpdateObjectDto($entity, $skipColumns);
        $this->getUpdateObjectService()->setData($dto);

        try {
            $this->getUpdateObjectService()->execute();
        } catch (\Throwable $exception) {
            \report($exception);
        }
    }

    /**
     * @param AbstractSalesForceObjectEntity $entity
     *
     * @param array $skipColumns
     * @throws \App\Exceptions\SalesForce\SalesForceApiException
     */
    public function addObject(AbstractSalesForceObjectEntity $entity, $skipColumns = [])
    {
        $dto = new AddObjectDto($entity, $skipColumns);
        $this->getAddObjectService()->setData($dto);
        $this->getAddObjectService()->execute();
    }

    public function getSalesForceObjectData(AbstractSalesForceObjectEntity $entity)
    {
        $dto = new GetSalesForceObjectDataDto($entity);

        try {

            $this->getGetObjectService()->setData($dto);
            $this->getGetObjectService()->execute();

        } catch (\Throwable $exception) {
            report($exception);
        }
    }

    public function getObjectDataBySalesfoceId($entityClass, $sfObjectId)
    {
        $dto = new GetSalesForceObjectByIdDto($entityClass, $sfObjectId);
        $service = $this->getGetObjectService();
        $service->setData($dto);
        $service->execute();

        return $dto->getData();
    }

    public function getAllObjectRecords($entityClass, $whereClause = null)
    {

        $dto = new SOQLQuerySelectObjectRowsDto(
            $entityClass,
            SOQLQuerySelectObjectRowsDto::RETURN_OBJECT,
            $whereClause
        );

        $this->getSOQLQueryService()->setData($dto);
        $this->getSOQLQueryService()->execute();

        $return = $dto->getReturnData();

        return $return->records;
    }

    public function syncAllObjectsOfType($entityClass)
    {
        $records = $this->getAllObjectRecords($entityClass);
        $repository = $this->getEntityManager()->getRepository($entityClass);

        foreach($records as $record) {

            $storedRecord = $repository->findBySalesForceObjectId($record->Id);

            if (null === $storedRecord) {
                $storedRecord = new $entityClass();
                $this->entityManager->persist($storedRecord);
            }

            $this->populateFromSalesForceData($record, $storedRecord, $entityClass::getSfMapping());
        }

        $this->entityManager->flush();
    }

    public function syncChildrenOfObject(AbstractSalesForceObjectEntity $entity, array $childrenClasses = [])
    {
        $allChildren = $entity::getChildRelationships();
        $pullChildren = \count($childrenClasses) === 0
            ? $allChildren
            : \array_intersect_key($allChildren, \array_flip($childrenClasses));
        
        foreach($pullChildren as $k => $childRelationship) {
            $this->syncChildOfObject($entity, $childRelationship);
        }
    }

    public function syncChildOfObject(
        AbstractSalesForceObjectEntity $entity,
        SalesForceChildRelationship $childRelationship
    ) {
        $childFqn = $childRelationship->getChildObjectClass();
        $repo = $this->entityManager->getRepository($childFqn);

        $dto = new GetObjectChildrenDto($entity, $childRelationship);

        $this->getGetObjectChildrenService()->setData($dto);
        $this->getGetObjectChildrenService()->execute();

        $return = $dto->getReturnData();

        foreach($return->records as $record) {

            $storedRecord = $repo->findBySalesForceObjectId($record->Id);

            if (null === $storedRecord) {
                $storedRecord = new $childFqn();
                $this->entityManager->persist($storedRecord);
            }

            $setter = \sprintf('set%s', \ucfirst($childRelationship->getOwningPropertyName()));
            $storedRecord->$setter($entity);

            $this->populateFromSalesForceData($record, $storedRecord, $childFqn::getSfMapping());
        }

        $this->entityManager->flush();
    }

    // Getters
    protected function getAddObjectService(): AddObject
    {
        if (null === $this->addObject) {
            $this->addObject = app(AddObject::class);
        }

        return $this->addObject;
    }

    protected function getGetObjectService(): GetSalesForceObjectData
    {
        if (null === $this->getObject) {
            $this->getObject = app(GetSalesForceObjectData::class);
        }

        return $this->getObject;
    }

    protected function getUpdateObjectService(): UpdateObject
    {
        if (null === $this->updateObject) {
            $this->updateObject = app(UpdateObject::class);
        }

        return $this->updateObject;
    }

    protected function getSOQLQueryService(): SOQLQuery
    {
        if (null === $this->SOQLQuery) {
            $this->SOQLQuery = app(SOQLQuery::class);
        }

        return $this->SOQLQuery;
    }

    protected function getGetObjectChildrenService(): GetObjectChildren
    {
        if (null === $this->getObjectChildren) {
            $this->getObjectChildren = app(GetObjectChildren::class);
        }

        return $this->getObjectChildren;
    }
}
