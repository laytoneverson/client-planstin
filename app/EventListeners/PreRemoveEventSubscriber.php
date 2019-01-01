<?php
/**
 * File: PreRemoveEventSubscriber.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\EventListeners;


use App\Entities\AbstractSalesForceObjectEntity;
use App\Exceptions\SalesForce\SalesForceApiException;
use App\Services\SalesForce\ApiCall\RemoveObject;
use App\Services\SalesForce\Dto\RemoveObjectDto;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class PreRemoveEventSubscriber implements EventSubscriber
{
    /**
     * @var RemoveObject
     */
    private $removeObject;

    public function __construct(RemoveObject $removeObject)
    {
        $this->removeObject = $removeObject;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::preRemove,
        ];
    }

    /**
     * @param LifecycleEventArgs $eventArgs
     * @throws \Throwable
     */
    public function preRemove(LifecycleEventArgs $eventArgs)
    {
        $object = $eventArgs->getObject();

        if ($object instanceof AbstractSalesForceObjectEntity) {

            $dto = new RemoveObjectDto($object);
            $this->removeObject->setData($dto);

            try {

                $this->removeObject->execute();

            } catch (SalesForceApiException $exception) {
                report($exception);
            } catch (\Throwable $exception) {
                report($exception);
                throw $exception;
            }
        }
    }
}
