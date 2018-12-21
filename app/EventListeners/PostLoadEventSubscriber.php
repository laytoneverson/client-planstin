<?php
/**
 * File: LoadSalesForceObjectListener.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\EventListeners;

use App\Entities\AbstractSalesForceObjectEntity;
use App\Services\SalesForce\ApiCall\GetSalesForceObjectData;
use App\Services\SalesForce\Dto\GetSalesForceObjectDataDto;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class PostLoadEventSubscriber implements EventSubscriber
{
    /**
     * @var GetSalesForceObjectData
     */
    private $getSalesForceObjectData;

    public function __construct(GetSalesForceObjectData $getSalesForceObjectData)
    {
        $this->getSalesForceObjectData = $getSalesForceObjectData;
    }

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
            && null !== $entity->getSfObjectId()
        ) {

            $dto = new GetSalesForceObjectDataDto($entity);

            try {

                $this->getSalesForceObjectData->setData($dto);
                $this->getSalesForceObjectData->execute();

            } catch (\Throwable $exception) {
                report($exception);
            }
        }
    }
}
