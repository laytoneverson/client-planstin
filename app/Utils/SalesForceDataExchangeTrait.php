<?php
/**
 * File: SalesForceDataExchangeTrait.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Utils;

use App\Entities\AbstractSalesForceObjectEntity;
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
        /**
         * @var PropertyAccessor $accessor
         */
        $accessor = $this->getAccessor();

        $fromData = \is_array($fromData) ?: (object)$fromData;

        foreach($mapping as $sfProperty => $localProperty) {
            if ($accessor->isWritable($toObject, $localProperty)) {
                $accessor->setValue(
                    $toObject,
                    $localProperty,
                    $accessor->getValue($fromData, $sfProperty)
                );
            }
        }

    }

    /**
     * @param AbstractSalesForceObjectEntity $from
     * @param array $mapping
     * @param bool $ignoreIdField
     * @return array
     */
    protected function convertToSalesForceData(
        AbstractSalesForceObjectEntity $from,
        array $mapping,
        $ignoreIdField = false
    ): array {

        $accessor = $this->getAccessor();

        $return = [];
        foreach ($mapping as $sfProperty => $localProperty) {

            if ($ignoreIdField && $sfProperty === 'Id') {
                continue;
            }

            if ($accessor->isReadable($from, $localProperty)) {
                $return[$sfProperty] = $accessor->getValue($from, $localProperty);
            }
        }

        return $return;
    }
}
