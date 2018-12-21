<?php
/**
 * File: CoverageTierPrice.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\CoverageTierPriceRepository")
 * @ORM\Table(name="coverage_tier_price")
 */
class CoverageTierPrice extends AbstractSalesForceObjectEntity
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
    private $priceTierLabel;

    /**
     * @var CoverageTierBook
     * @ORM\ManyToOne(targetEntity="CoverageTierBook", inversedBy="coverageTierPrices")
     */
    private $coverageTierBook;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    private $employeePrice;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    private $employeeSpousePrice;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    private $employeeChildrenPrice;

    /**
     * @var float
     * @ORM\Column(type="decimal")
     */
    private $employeeFamilyPrice;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $tierPriceName;

    public static function getSfObjectApiName(): string
    {
        return 'Coverage_Tier_Price__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Coverage Tier Price';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'EC__c' => 'employeeChildrenPrice',
            'EE__c' => 'employeePrice',
            'EF__c' => 'employeeFamilyPrice',
            'ES__c' => 'employeeSpousePrice',
            'Name' => 'tierPriceName',
            'Tier_Price_Label__c' => 'priceTierLabel',
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CoverageTierPrice
     */
    public function setId(int $id): CoverageTierPrice
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPriceTierLabel():? string
    {
        return $this->priceTierLabel;
    }

    /**
     * @param string $priceTierLabel
     * @return CoverageTierPrice
     */
    public function setPriceTierLabel(string $priceTierLabel)
    {
        $this->priceTierLabel = $priceTierLabel;

        return $this;
    }

    /**
     * @return CoverageTierBook
     */
    public function getCoverageTierBook():? CoverageTierBook
    {
        return $this->coverageTierBook;
    }

    /**
     * @param CoverageTierBook $coverageTierBook
     * @return CoverageTierPrice
     */
    public function setCoverageTierBook(CoverageTierBook $coverageTierBook)
    {
        $this->coverageTierBook = $coverageTierBook;

        return $this;
    }

    /**
     * @return float
     */
    public function getEmployeePrice():? float
    {
        return $this->employeePrice;
    }

    /**
     * @param float $employeePrice
     * @return CoverageTierPrice
     */
    public function setEmployeePrice(float $employeePrice)
    {
        $this->employeePrice = $employeePrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getEmployeeSpousePrice():? float
    {
        return $this->employeeSpousePrice;
    }

    /**
     * @param float $employeeSpousePrice
     * @return CoverageTierPrice
     */
    public function setEmployeeSpousePrice(float $employeeSpousePrice)
    {
        $this->employeeSpousePrice = $employeeSpousePrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getEmployeeChildrenPrice():? float
    {
        return $this->employeeChildrenPrice;
    }

    /**
     * @param float $employeeChildrenPrice
     * @return CoverageTierPrice
     */
    public function setEmployeeChildrenPrice(float $employeeChildrenPrice)
    {
        $this->employeeChildrenPrice = $employeeChildrenPrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getEmployeeFamilyPrice():? float
    {
        return $this->employeeFamilyPrice;
    }

    /**
     * @param float $employeeFamilyPrice
     * @return CoverageTierPrice
     */
    public function setEmployeeFamilyPrice(float $employeeFamilyPrice)
    {
        $this->employeeFamilyPrice = $employeeFamilyPrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getTierPriceName(): string
    {
        return $this->tierPriceName;
    }

    /**
     * @param string $tierPriceName
     * @return CoverageTierPrice
     */
    public function setTierPriceName(string $tierPriceName)
    {
        $this->tierPriceName = $tierPriceName;

        return $this;
    }


}
