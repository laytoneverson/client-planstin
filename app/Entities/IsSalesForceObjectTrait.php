<?php
/**
 * File: SalesForceObjectTrait.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

trait IsSalesForceObjectTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $sfObjectId;

    /**
     * @return string
     */
    abstract public function getSfObjectApiName(): string;

    /**
     * @return string
     */
    abstract public function getSfObjectFriendlyName(): string;

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
    public function setSfObjectId(string $sfObjectId = null): self
    {
        $this->sfObjectId = $sfObjectId;

        return $this;
    }

    /**
     * Returns an array mapping of field names. sf => local
     *
     * @return array
     */
    public function getSfMapping(): array
    {
        return [];
    }
}
