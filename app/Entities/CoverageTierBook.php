<?php
/**
 * File: CoverageTierBook.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\CoverageTierBookRepository")
 * @ORM\Table(name="coverage_tier_book")
 */
class CoverageTierBook extends AbstractSalesForceObjectEntity
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $coverageTierBookName;

    /**
     * @var BenefitPlan
     * @ORM\ManyToOne(targetEntity="BenefitPlan", inversedBy="coverageTierBooks")
     */
    protected $benefitPlan;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CoverageTierPrice", mappedBy="coverageTierBook")
     */
    protected $coverageTierPrices;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $coverageTierLabel;

    public static function getSfObjectApiName(): string
    {
        return 'Coverage_Tier_Book__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Coverage Tier Book';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Name' => 'coverageTierBookName',
            'Tier_Book_Label__c' => 'coverageTierLabel',
        ];
    }

    public static function getChildRelationships()
    {
        return [
            CoverageTierPrice::class => new SalesForceChildRelationship(
                CoverageTierPrice::class,
                'Coverage_Tier_Prices',
                'coverageTierPrices',
                'coverageTierBook'
            ),
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CoverageTierBook
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getCoverageTierBookName():? string
    {
        return $this->coverageTierBookName;
    }

    /**
     * @param string $coverageTierBookName
     * @return CoverageTierBook
     */
    public function setCoverageTierBookName(string $coverageTierBookName)
    {
        $this->coverageTierBookName = $coverageTierBookName;

        return $this;
    }

    /**
     * @return BenefitPlan
     */
    public function getBenefitPlan(): BenefitPlan
    {
        return $this->benefitPlan;
    }

    /**
     * @param BenefitPlan $benefitPlan
     * @return CoverageTierBook
     */
    public function setBenefitPlan(BenefitPlan $benefitPlan)
    {
        $this->benefitPlan = $benefitPlan;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCoverageTierPrices(): Collection
    {
        return $this->coverageTierPrices;
    }

    /**
     * @param ArrayCollection $coverageTierPrices
     * @return CoverageTierBook
     */
    public function setCoverageTierPrices(ArrayCollection $coverageTierPrices)
    {
        $this->coverageTierPrices = $coverageTierPrices;

        return $this;
    }

    /**
     * @return string
     */
    public function getCoverageTierLabel():? string
    {
        return $this->coverageTierLabel;
    }

    /**
     * @param string $coverageTierLabel
     * @return CoverageTierBook
     */
    public function setCoverageTierLabel(string $coverageTierLabel)
    {
        $this->coverageTierLabel = $coverageTierLabel;

        return $this;
    }
}
