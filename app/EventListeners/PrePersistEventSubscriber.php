<?php
/**
 * File: PrePersistEventSubscriber.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\EventListeners;

use App\Entities\AbstractSalesForceObjectEntity;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class PrePersistEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getObject();

        if ($entity instanceof AbstractSalesForceObjectEntity
            && $entity::autoAddToSalesForce()
        ) {
            $persistenceService = $entity::getSalesForcePersistenceService();
            $persistenceService->addObject($entity);
        }
    }
}
