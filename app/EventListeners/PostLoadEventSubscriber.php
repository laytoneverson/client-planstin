<?php
/**
 * File: LoadSalesForceObjectListener.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\EventListeners;

use App\Entities\AbstractSalesForceObjectEntity;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class PostLoadEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::postLoad,
        ];
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (
            $entity instanceof AbstractSalesForceObjectEntity
            && $entity::autoPullFromSalesForce()
            && null !== $entity->getSfObjectId()
        ) {
            $persistenceService = $entity::getSalesForcePersistenceService();
            $persistenceService->getSalesForceObjectData($entity);
        }
    }
}
