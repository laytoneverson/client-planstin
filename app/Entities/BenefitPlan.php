<?php
/**
 * File: BenefitPlan.php* Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use App\Services\SalesForce\Persistence\BenefitPlanPersistenceService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\BenefitPlanRepository")
 * @ORM\Table(name="benefit_plan")
 */
class BenefitPlan extends AbstractSalesForceObjectEntity
{
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
    private $benefitPlanDisplayName;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $benefitPlanName;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @var BenefitPlanFamily
     *
     * @ORM\ManyToOne(targetEntity="BenefitPlanFamily", inversedBy="benefitPlans")
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
     * @ORM\OneToMany(targetEntity="CoverageTierBook", mappedBy="benefitPlan")
     */
    private $coverageTierBooks;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="BenefitPlanFeature", mappedBy="benefitPlan")
     */
    private $benefitPlanFeatures;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="BenefitPlanFeature", mappedBy="benefitPlan")
     */
    private $benefitPlanCopays;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="BenefitPlanFeature", mappedBy="benefitPlan")
     */
    private $prescriptionCopays;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="GroupClientPlanOffered", mappedBy="benefitPlan")
     */
     private $offeredByGroupClients;

    /**
     * @var MemberPlanEnrollment[]|Collection
     *
     * @ORM\OneToMany(targetEntity="MemberPlanEnrollment", mappedBy="benefitPlan")
     */
     private $memberEnrollments;

    public function __construct()
    {
        $this->prescriptionCopays = new ArrayCollection();
        $this->benefitPlanCopays = new ArrayCollection();
        $this->benefitPlanFeatures = new ArrayCollection();
        $this->coverageTierBooks = new ArrayCollection();
        $this->offeredByGroupClients = new ArrayCollection();
        $this->memberEnrollments = new ArrayCollection();
    }

    public static function getSfObjectApiName(): string
    {
        return 'Benefit_Plan__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Planstin Benefit Plan';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Benefit_Plan_Name__c' => 'benefitPlanDisplayName',
            'Name' => 'benefitPlanName',
            'Active__c' => 'active',
            'Benefit_Plan_Family__c' => 'planFamily.sfObjectId',
            'Plan_Details_Link__c' => 'planDetailsLink',
        ];
    }

    public static function getSalesForcePersistenceService()
    {
        return BenefitPlanPersistenceService::class;
    }

    public static function getChildRelationships()
    {
        return [
            CoverageTierBook::class => new SalesForceChildRelationship(
                CoverageTierBook::class,
                'Coverage_Tier_Books',
                'coverageTierBooks',
                'benefitPlan'
            ),
            BenefitPlanFeature::class => new SalesForceChildRelationship(
                BenefitPlanFeature::class,
                'Benefit_Plan_Features',
                'benefitPlanFeatures',
                'benefitPlan'
            ),
            BenefitPlanCopay::class => new SalesForceChildRelationship(
                BenefitPlanCopay::class,
                'Benefit_Plan_CoPays',
                'benefitPlanCopays',
                'benefitPlan'
            ),
            PrescriptionCopay::class => new SalesForceChildRelationship(
                PrescriptionCopay::class,
                'Prescription_Copays',
                'prescriptionCopays',
                'benefitPlan'
            ),
            GroupClientPlanOffered::class => new SalesForceChildRelationship(
                GroupClientPlanOffered::class,
                'Client_Plans_Offered',
                'offeredByGroupClients',
                'benefitPlan'
            ),
            MemberPlanEnrollment::class => new SalesForceChildRelationship(
                MemberPlanEnrollment::class,
                'Member_Plan_Enrollments',
                'memberEnrollments',
                'benefitPlan'
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
     * @return BenefitPlan
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitPlanDisplayName():? string
    {
        return $this->benefitPlanDisplayName;
    }

    /**
     * @param string $benefitPlanDisplayName
     * @return BenefitPlan
     */
    public function setBenefitPlanDisplayName(string $benefitPlanDisplayName)
    {
        $this->benefitPlanDisplayName = $benefitPlanDisplayName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitPlanName():? string
    {
        return $this->benefitPlanName;
    }

    /**
     * @param string $benefitPlanName
     * @return BenefitPlan
     */
    public function setBenefitPlanName(string $benefitPlanName)
    {
        $this->benefitPlanName = $benefitPlanName;

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
     * @return BenefitPlan
     */
    public function setCoverageTierBooks(ArrayCollection $coverageTierBooks)
    {
        $this->coverageTierBooks = $coverageTierBooks;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBenefitPlanFeatures(): Collection
    {
        return $this->benefitPlanFeatures;
    }

    /**
     * @param ArrayCollection $benefitPlanFeatures
     * @return BenefitPlan
     */
    public function setBenefitPlanFeatures(ArrayCollection $benefitPlanFeatures)
    {
        $this->benefitPlanFeatures = $benefitPlanFeatures;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBenefitPlanCopays(): Collection
    {
        return $this->benefitPlanCopays;
    }

    /**
     * @param ArrayCollection $benefitPlanCopays
     * @return BenefitPlan
     */
    public function setBenefitPlanCopays(ArrayCollection $benefitPlanCopays)
    {
        $this->benefitPlanCopays = $benefitPlanCopays;

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
     * @return BenefitPlan
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
     * @return BenefitPlan
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
     * @param mixed $benefitPlanFeature
     */
    public function addBenefitPlanFeature($benefitPlanFeature)
    {
        $this->benefitPlanFeatures->add($benefitPlanFeature);
    }

    /**
     * @param mixed $benefitPlanFeature
     */
    public function removeBenefitPlanFeature($benefitPlanFeature)
    {
        $this->benefitPlanFeatures->removeElement($benefitPlanFeature);
    }

    /**
     * @param mixed $benefitPlanCopay
     */
    public function addBenefitPlanCopay($benefitPlanCopay)
    {
        $this->benefitPlanCopays->add($benefitPlanCopay);
    }

    /**
     * @param mixed $benefitPlanCopay
     */
    public function removeBenefitPlanCopay($benefitPlanCopay)
    {
        $this->benefitPlanCopays->removeElement($benefitPlanCopay);
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

        $offeredByGroupClient->setBenefitPlan($this);
    }

    /**
     * @param GroupClientPlanOffered $offeredByGroupClient
     */
    public function removeOfferedByGroupClient(GroupClientPlanOffered $offeredByGroupClient)
    {
        $this->offeredByGroupClients->removeElement($offeredByGroupClient);

        $offeredByGroupClient->setBenefitPlan(null);
    }

    /**
     * @return BenefitPlanFamily
     */
    public function getPlanFamily(): ?BenefitPlanFamily
    {
        return $this->planFamily;
    }

    /**
     * @param BenefitPlanFamily $planFamily
     *
     * @return BenefitPlan
     */
    public function setPlanFamily(BenefitPlanFamily $planFamily)
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
     * @return BenefitPlan
     */
    public function setPlanDetailsLink(?string $planDetailsLink)
    {
        $this->planDetailsLink = $planDetailsLink;

        return $this;
    }

    /**
     * @return MemberPlanEnrollment[]|Collection
     */
    public function getMemberEnrollments()
    {
        return $this->memberEnrollments;
    }

    /**
     * @param MemberPlanEnrollment[]|Collection $memberEnrollments
     */
    public function setMemberEnrollments($memberEnrollments): void
    {
        $this->memberEnrollments = $memberEnrollments;
    }

    /**
     * @param MemberPlanEnrollment $memberEnrollment
     */
    public function addMemberEnrollment(MemberPlanEnrollment $memberEnrollment)
    {
        $this->memberEnrollments->add($memberEnrollment);
    }

    /**
     * @param MemberPlanEnrollment $memberEnrollment
     */
    public function removeMemberEnrollment(MemberPlanEnrollment $memberEnrollment)
    {
        $this->memberEnrollments->removeElement($memberEnrollment);
    }
}
