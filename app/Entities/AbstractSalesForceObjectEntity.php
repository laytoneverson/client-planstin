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
}
