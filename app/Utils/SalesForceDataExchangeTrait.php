<?php
/**
 * File: SalesForceDataExchangeTrait.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Utils;

use App\Entities\AbstractSalesForceObjectEntity;
use stdClass;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

trait SalesForceDataExchangeTrait
{
    private function getAccessor(): PropertyAccessor
    {
        return PropertyAccess::createPropertyAccessor();
    }

    /**
     * @param object|array $fromData
     * @param AbstractSalesForceObjectEntity $toObject
     */
    public function populateFromSalesForceData($fromData, AbstractSalesForceObjectEntity $toObject, array $mapping)
    {
        $accessor = $this->getAccessor();

        $fromData = \is_array($fromData) ?: (object)$fromData;

        foreach($mapping as $sfProperty => $localProperty) {
            $accessor->setValue(
                $toObject,
                $localProperty,
                $accessor->getValue($fromData, $sfProperty)
            );
        }

    }

    protected function convertToSalesForceData(AbstractSalesForceObjectEntity $from, array $mapping)
    {
        $accessor = $this->getAccessor();

        $return = [];
        foreach ($mapping as $sfProperty => $localProperty) {
            $return[$sfProperty] = $accessor->getValue($from, $localProperty);
        }

        return $return;
    }
}
