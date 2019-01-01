<?php
/**
 * File: PrePersistEventSubscriber.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\EventListeners;


use App\Entities\AbstractSalesForceObjectEntity;
use App\Services\SalesForce\ApiCall\AddObject;
use App\Services\SalesForce\Dto\AddObjectDto;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class PrePersistEventSubscriber implements EventSubscriber
{
    /**
     * @var AddObject
     */
    private $addObject;

    public function __construct(AddObject $addObject)
    {
        $this->addObject = $addObject;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $object = $eventArgs->getObject();

        if ($object instanceof AbstractSalesForceObjectEntity && $object->autoAddToSalesForce()) {
            $dto = new AddObjectDto($object);
            $this->addObject->setData($dto);

            try {
                $this->addObject->execute();
            } catch (\Throwable $exception) {
                \report($exception);

                throw $exception;
            }
        }
    }
}
