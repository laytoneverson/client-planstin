<?php
/**
 * File: InsurancePlan.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\InsurancePlanRepository")
 * @ORM\Table(name="insurance_plan")
 */
class InsurancePlan extends AbstractSalesForceObjectEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $insurancePlanDisplayName;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $insurancePlanName;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $active = true;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CoverageTierBook", mappedBy="insurancePlan")
     */
    protected $coverageTierBooks;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="InsurancePlanFeature", mappedBy="insurancePlan")
     */
    protected $insurancePlanFeatures;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="InsurancePlanFeature", mappedBy="insurancePlan")
     */
    protected $insurancePlanCopays;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="InsurancePlanFeature", mappedBy="insurancePlan")
     */
    protected $prescriptionCopays;

    public function __construct()
    {
        $this->prescriptionCopays = new ArrayCollection();
        $this->insurancePlanCopays = new ArrayCollection();
        $this->insurancePlanFeatures = new ArrayCollection();
        $this->coverageTierBooks = new ArrayCollection();
    }

    public static function getSfObjectApiName(): string
    {
        return 'Insurance_Plan__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Insurance Plan';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Insurance_Plan_Name__c' => 'insurancePlanDisplayName',
            'Name' => 'insurancePlanName',
            'Active__c' => 'active'
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
     * @return InsurancePlan
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getInsurancePlanDisplayName():? string
    {
        return $this->insurancePlanDisplayName;
    }

    /**
     * @param string $insurancePlanDisplayName
     * @return InsurancePlan
     */
    public function setInsurancePlanDisplayName(string $insurancePlanDisplayName)
    {
        $this->insurancePlanDisplayName = $insurancePlanDisplayName;

        return $this;
    }

    /**
     * @return string
     */
    public function getInsurancePlanName():? string
    {
        return $this->insurancePlanName;
    }

    /**
     * @param string $insurancePlanName
     * @return InsurancePlan
     */
    public function setInsurancePlanName(string $insurancePlanName)
    {
        $this->insurancePlanName = $insurancePlanName;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCoverageTierBooks(): ArrayCollection
    {
        return $this->coverageTierBooks;
    }

    /**
     * @param ArrayCollection $coverageTierBooks
     * @return InsurancePlan
     */
    public function setCoverageTierBooks(ArrayCollection $coverageTierBooks)
    {
        $this->coverageTierBooks = $coverageTierBooks;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getInsurancePlanFeatures(): ArrayCollection
    {
        return $this->insurancePlanFeatures;
    }

    /**
     * @param ArrayCollection $insurancePlanFeatures
     * @return InsurancePlan
     */
    public function setInsurancePlanFeatures(ArrayCollection $insurancePlanFeatures)
    {
        $this->insurancePlanFeatures = $insurancePlanFeatures;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getInsurancePlanCopays(): ArrayCollection
    {
        return $this->insurancePlanCopays;
    }

    /**
     * @param ArrayCollection $insurancePlanCopays
     * @return InsurancePlan
     */
    public function setInsurancePlanCopays(ArrayCollection $insurancePlanCopays)
    {
        $this->insurancePlanCopays = $insurancePlanCopays;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPrescriptionCopays(): ArrayCollection
    {
        return $this->prescriptionCopays;
    }

    /**
     * @param ArrayCollection $prescriptionCopays
     * @return InsurancePlan
     */
    public function setPrescriptionCopays(ArrayCollection $prescriptionCopays)
    {
        $this->prescriptionCopays = $prescriptionCopays;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return InsurancePlan
     */
    public function setActive(bool $active)
    {
        $this->active = $active;

        return $this;
    }
}
