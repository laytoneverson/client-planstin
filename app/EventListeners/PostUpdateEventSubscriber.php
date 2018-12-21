<?php
/**
 * File: PostUpdateEventSubscriber.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\EventListeners;

use App\Entities\AbstractSalesForceObjectEntity;
use App\Services\SalesForce\ApiCall\UpdateObject;
use App\Services\SalesForce\Dto\UpdateObjectDto;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class PostUpdateEventSubscriber implements EventSubscriber
{
    /**
     * @var UpdateObject
     */
    private $updateObject;


    /**
     * PostUpdateEventSubscriber constructor.
     *
     * @param UpdateObject $updateObject
     */
    public function __construct(UpdateObject $updateObject)
    {
        $this->updateObject = $updateObject;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::postUpdate,
        ];
    }

    public function postUpdate(LifecycleEventArgs $eventArgs)
    {
        $object = $eventArgs->getObject();

        if ($object instanceof AbstractSalesForceObjectEntity) {
            $dto = new UpdateObjectDto($object);
            $this->updateObject->setData($dto);

            try {
                $this->updateObject->execute();
            } catch (\Throwable $exception) {
                \report($exception);
            }
        }
    }
}
