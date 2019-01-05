<?php
/**
 * File: SalesForceChildRelationship.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

class SalesForceChildRelationship
{
    protected $childObjectClass;

    protected $salesForceRelationshipName;

    protected $inversePropertyName;

    protected $owningPropertyName;

    public function __construct(
        string $childObjectClass,
        string $salesForceRelationshipName,
        string $inversePropertyName,
        string $owningPropertyName
    )  {
        $this->childObjectClass = $childObjectClass;
        $this->inversePropertyName = $inversePropertyName;
        $this->owningPropertyName = $owningPropertyName;
        $this->salesForceRelationshipName = $salesForceRelationshipName;
    }

    public function __toArray(): array
    {
        return [
            'childObjectClass' => $this->childObjectClass,
            'salesForceRelationshipName' => $this->salesForceRelationshipName,
            'owningPropertyName' => $this->owningPropertyName,
            'inversePropertyName' => $this->inversePropertyName,
        ];
    }

    /**
     * @return string
     */
    public function getChildObjectClass(): string
    {
        return $this->childObjectClass;
    }

    /**
     * @return string
     */
    public function getSalesForceRelationshipName(): string
    {
        return $this->salesForceRelationshipName;
    }

    /**
     * @return string
     */
    public function getInversePropertyName(): string
    {
        return $this->inversePropertyName;
    }

    /**
     * @return string
     */
    public function getOwningPropertyName(): string
    {
        return $this->owningPropertyName;
    }
}
