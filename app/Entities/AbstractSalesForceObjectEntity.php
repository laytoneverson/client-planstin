<?php
/**
 * File: AbstractSalesForceObjectEntity.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use App\Repositories\SalesForceObjectRepositoryTrait;
use Doctrine\ORM\Mapping as ORM;

abstract class AbstractSalesForceObjectEntity
{
    use SalesForceObjectRepositoryTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $sfObjectId;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $salesForceUpdate;

    /**
     * @return string
     */
    abstract public static function getSfObjectApiName(): string;

    /**
     * @return string
     */
    abstract public static function getSfObjectFriendlyName(): string;

    /**
     * Returns an array mapping of field names. sf => local
     *
     * @return array
     */
    abstract public static function getSfMapping(): array;

    /**
     * Override and return true to have the application automatically add this entity to salesforce when its persisted
     * to the database.
     *
     * @return bool
     */
    public function autoAddToSalesForce(): bool
    {
        return false;
    }

    /**
     * @return string
     */
    public function getSfObjectId():? string
    {
        return $this->sfObjectId;
    }

    /**
     * @param string $sfObjectId
     * @return self
     */
    public function setSfObjectId(string $sfObjectId = null)
    {
        $this->sfObjectId = $sfObjectId;

        return $this;
    }

    /**
     * Sets the current time on the salesForceUpdate field to mark the entity dirty which will cause an api update
     * on doctrine's flush during the postUpdate event.
     */
    public function setForUpdate()
    {
        $this->salesForceUpdate = new \DateTime();
    }
}
