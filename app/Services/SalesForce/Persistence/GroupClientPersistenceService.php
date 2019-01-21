<?php
/**
 * File: GroupClientPersistenceService Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Persistence;


use App\Entities\AbstractSalesForceObjectEntity;
use App\Entities\GroupClient;
use App\Services\SalesForce\Dto\AddObjectDto;
use LogicException;

class GroupClientPersistenceService extends GenericPersistenceService
{

    /**
     * @param AbstractSalesForceObjectEntity $entity
     * @throws \App\Exceptions\SalesForce\SalesForceApiException
     */
    public function addObject(AbstractSalesForceObjectEntity $entity, $skipColumns = [])
    {
        if (!$entity instanceof GroupClient) {
            throw new LogicException(
                'This function only handles adding a new GroupClient entity to salesforce.'
            );
        }

        if ($entity->getSfObjectId()) {
            throw new LogicException(
                'This object is already in salesforce. Use the updateObject method.'
            );
        }

        //Add group client to SF
        $groupClientDto = new AddObjectDto($entity);
        $this->getAddObjectService()->setData($groupClientDto);
        $this->getAddObjectService()->execute();

        //Add primary contact to SF
        $contactDto = new AddObjectDto($entity->getPrimaryContact());
        $this->getAddObjectService()->setData($contactDto);
        $this->getAddObjectService()->execute();
    }

}
