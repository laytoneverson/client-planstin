<?php
/**
 * File: PostUpdateEventSubscriber.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\EventListeners;

use App\Entities\AbstractSalesForceObjectEntity;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;

class PreUpdateEventSubscriber implements EventSubscriber
{

    public function getSubscribedEvents()
    {
        return [
            Events::preUpdate,
        ];
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $entity = $eventArgs->getObject();

        if (
            $entity instanceof AbstractSalesForceObjectEntity
            && $entity::autoUpdateInSalesForce()
            && null !== $entity->getSfObjectId()
        ) {
            $persistenceManager = $entity::getSalesForcePersistenceService();
            $persistenceManager->updateObject($entity);
        }
    }
}
