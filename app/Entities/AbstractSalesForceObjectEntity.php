<?php
/**
 * File: AbstractSalesForceObjectEntity.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use App\Repositories\SalesForceObjectRepositoryTrait;
use App\Services\SalesForce\Persistence\AbstractPersistenceService;
use App\Services\SalesForce\Persistence\GenericPersistenceService;
use App\Services\SalesForce\Persistence\SalesForcePersistenceServiceInterface;
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

    public function __get($name)
    {
        return (isset($this->$name)) ? $this->$name : null;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    /**
     * @return SalesForceChildRelationship[]
     */
    public static function getChildRelationships()
    {
        return [];
    }

    /**
     * Override and return true to have the application automatically add this entity to salesforce when its persisted
     * to the database.
     *
     * @return bool
     */
    public static function autoAddToSalesForce(): bool
    {
        return false;
    }

    public static function autoPullFromSalesForce(): bool
    {
        return false;
    }

    public static function autoUpdateInSalesForce(): bool
    {
        return false;
    }

    /**
     * @return SalesForcePersistenceServiceInterface
     */
    public static function getSalesForcePersistenceService()
    {
        return app(GenericPersistenceService::class);
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
