<?php
/**
 * File: InsurancePlan.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\InsurancePlanRepository")
 * @ORM\Table(name="insurance_plan")
 */
class InsurancePlan extends AbstractSalesForceObjectEntity
{
    public const FAMILY_BASE_HEALTH = 'Base Health';
    public const FAMILY_CATASTROPHIC = 'Catastrophic';
    public const FAMILY_DENTAL = 'Dental';
    public const FAMILY_SUPPLEMENTAL = 'Supplemental';
    public const FAMILY_HEALTHSHARE = 'HealthShare';
    public const FAMILY_VISION = 'Vision';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $insurancePlanDisplayName;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $insurancePlanName;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $planFamily;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $planDetailsLink;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="CoverageTierBook", mappedBy="insurancePlan")
     */
    private $coverageTierBooks;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="InsurancePlanFeature", mappedBy="insurancePlan")
     */
    private $insurancePlanFeatures;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="InsurancePlanFeature", mappedBy="insurancePlan")
     */
    private $insurancePlanCopays;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="InsurancePlanFeature", mappedBy="insurancePlan")
     */
    private $prescriptionCopays;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="GroupClientPlanOffered", mappedBy="insurancePlan")
     */
     private $offeredByGroupClients;

    public static function getPlanFamilies()
    {
        return [
            self::FAMILY_BASE_HEALTH,
            self::FAMILY_HEALTHSHARE,
            self::FAMILY_SUPPLEMENTAL,
            self::FAMILY_CATASTROPHIC,
            self::FAMILY_DENTAL,
            self::FAMILY_VISION,
        ];
    }

    public function __construct()
    {
        $this->prescriptionCopays = new ArrayCollection();
        $this->insurancePlanCopays = new ArrayCollection();
        $this->insurancePlanFeatures = new ArrayCollection();
        $this->coverageTierBooks = new ArrayCollection();
        $this->offeredByGroupClients = new ArrayCollection();
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
            'Active__c' => 'active',
            'Plan_Family__c' => 'planFamily',
            'Plan_Details_Link__c' => 'planDetailsLink',
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
    public function getCoverageTierBooks(): Collection
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
    public function getInsurancePlanFeatures(): Collection
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
    public function getInsurancePlanCopays(): Collection
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
    public function getPrescriptionCopays(): Collection
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

    /**
     * @param mixed $coverageTierBook
     */
    public function addCoverageTierBook($coverageTierBook)
    {
        $this->coverageTierBooks->add($coverageTierBook);
    }

    /**
     * @param mixed $coverageTierBook
     */
    public function removeCoverageTierBook($coverageTierBook)
    {
        $this->coverageTierBooks->removeElement($coverageTierBook);
    }

    /**
     * @param mixed $insurancePlanFeature
     */
    public function addInsurancePlanFeature($insurancePlanFeature)
    {
        $this->insurancePlanFeatures->add($insurancePlanFeature);
    }

    /**
     * @param mixed $insurancePlanFeature
     */
    public function removeInsurancePlanFeature($insurancePlanFeature)
    {
        $this->insurancePlanFeatures->removeElement($insurancePlanFeature);
    }

    /**
     * @param mixed $insurancePlanCopay
     */
    public function addInsurancePlanCopay($insurancePlanCopay)
    {
        $this->insurancePlanCopays->add($insurancePlanCopay);
    }

    /**
     * @param mixed $insurancePlanCopay
     */
    public function removeInsurancePlanCopay($insurancePlanCopay)
    {
        $this->insurancePlanCopays->removeElement($insurancePlanCopay);
    }

    /**
     * @param mixed $prescriptionCopay
     */
    public function addPrescriptionCopay($prescriptionCopay)
    {
        $this->prescriptionCopays->add($prescriptionCopay);
    }

    /**
     * @param mixed $prescriptionCopay
     */
    public function removePrescriptionCopay($prescriptionCopay)
    {
        $this->prescriptionCopays->removeElement($prescriptionCopay);
    }

    /**
     * @param mixed $offeredByGroupClient
     */
    public function addOfferedByGroupClient($offeredByGroupClient)
    {
        $this->offeredByGroupClients->add($offeredByGroupClient);

        $offeredByGroupClient->setInsurancePlan($this);
    }

    /**
     * @param GroupClientPlanOffered $offeredByGroupClient
     */
    public function removeOfferedByGroupClient(GroupClientPlanOffered $offeredByGroupClient)
    {
        $this->offeredByGroupClients->removeElement($offeredByGroupClient);

        $offeredByGroupClient->setInsurancePlan(null);
    }

    /**
     * @return string
     */
    public function getPlanFamily(): string
    {
        return $this->planFamily;
    }

    /**
     * @param string $planFamily
     *
     * @return InsurancePlan
     */
    public function setPlanFamily(string $planFamily)
    {
        $this->planFamily = $planFamily;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlanDetailsLink():? string
    {
        return $this->planDetailsLink;
    }

    /**
     * @param string $planDetailsLink
     * @return InsurancePlan
     */
    public function setPlanDetailsLink(?string $planDetailsLink)
    {
        $this->planDetailsLink = $planDetailsLink;

        return $this;
    }
}
