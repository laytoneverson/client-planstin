<?php
/**
 * File: MemberPlanEntrollment.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\MemberPlanEnrollmentRepository")
 * @ORM\Table(name="member_plan_entrollment")
 */
class MemberPlanEnrollment extends AbstractSalesForceObjectEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="enrolledPlans")
     *
     * @var Member
     */
    private $member;

    private $memberSfId;

    /**
     * @ORM\ManyToOne(targetEntity="BenefitPlan", inversedBy="memberEnrollments")
     *
     * @var BenefitPlan
     */
    private $benefitPlan;

    private $benefitPlanSfId;

    /**
     * @ORM\OneToMany(targetEntity="DependentPlanEnrollment", mappedBy="memberPlanEnrollment")
     *
     * @var DependentPlanEnrollment[]|Collection
     */
    private $dependentPlanEnrollments;

    private $planeTermEnd;

    private $planEffectiveDate;

    private $planRate;

    private $coverageTier;

    private $planstinAdmin = false;

    private $contributionAmount;

    private $externalPolicyNumber;

    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Member_Plan_Enrollment__c';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Member Plan Enrollments';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Benefit_Plan__c' => 'benefitPlanSfId',
            'Contribution_Amount__c' => 'contributionAmount',
            'Coverage_Tier__c' => 'coverageTier',
            'Member__c' => 'memberSfId',
            'Plan_Effective_Date__c' => 'planEffectiveDate',
            'Plan_Rate__c' => 'planRate',
            'Plan_Term_End__c' => 'planeTermEnd',
            'Planstin_Admin__c' => 'planstinAdmin',
            'External_Policy_Number__c' => 'externalPolicyNumber',
        ];
    }


    public function __construct()
    {
        $this->dependentPlanEnrollments = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MemberPlanEnrollment
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @return mixed
     */
    public function getMemberSfId()
    {
        if ($this->member) {
            return $this->member->getSfObjectId();
        }

        return $this->memberSfId;
    }

    /**
     * @param mixed $memberSfId
     */
    public function setMemberSfId($memberSfId): void
    {
        $this->memberSfId = $memberSfId;
    }

    /**
     * @return mixed
     */
    public function getBenefitPlanSfId()
    {
        if ($this->benefitPlan) {
            return $this->benefitPlan->getSfObjectId();
        }

        return $this->benefitPlanSfId;
    }

    /**
     * @param mixed $benefitPlanSfId
     */
    public function setBenefitPlanSfId($benefitPlanSfId): void
    {
        $this->benefitPlanSfId = $benefitPlanSfId;
    }

    /**
     * @param mixed $member
     * @return MemberPlanEnrollment
     */
    public function setMember($member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBenefitPlan()
    {
        return $this->benefitPlan;
    }

    /**
     * @param mixed $benefitPlan
     * @return MemberPlanEnrollment
     */
    public function setBenefitPlan($benefitPlan)
    {
        $this->benefitPlan = $benefitPlan;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaneTermEnd()
    {
        return $this->planeTermEnd;
    }

    /**
     * @param mixed $planeTermEnd
     * @return MemberPlanEnrollment
     */
    public function setPlaneTermEnd($planeTermEnd)
    {
        $this->planeTermEnd = $planeTermEnd;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanEffectiveDate()
    {
        return $this->planEffectiveDate;
    }

    /**
     * @param mixed $planEffectiveDate
     * @return MemberPlanEnrollment
     */
    public function setPlanEffectiveDate($planEffectiveDate)
    {
        $this->planEffectiveDate = $planEffectiveDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanRate()
    {
        return $this->planRate;
    }

    /**
     * @param mixed $planRate
     * @return MemberPlanEnrollment
     */
    public function setPlanRate($planRate)
    {
        $this->planRate = $planRate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCoverageTier()
    {
        return $this->coverageTier;
    }

    /**
     * @param mixed $coverageTier
     * @return MemberPlanEnrollment
     */
    public function setCoverageTier($coverageTier)
    {
        $this->coverageTier = $coverageTier;

        return $this;
    }

    /**
     * @param DependentPlanEnrollment $dependentPlanEnrollment
     */
    public function addDependentPlanEnrollment(DependentPlanEnrollment $dependentPlanEnrollment)
    {
        $this->dependentPlanEnrollments->add($dependentPlanEnrollment);
    }

    /**
     * @param DependentPlanEnrollment $dependentPlanEnrollment
     */
    public function removeDependentPlanEnrollment(DependentPlanEnrollment $dependentPlanEnrollment)
    {
        $this->dependentPlanEnrollments->removeElement($dependentPlanEnrollment);
    }

    /**
     * @return mixed
     */
    public function getPlanstinAdmin()
    {
        return $this->planstinAdmin;
    }

    /**
     * @param mixed $planstinAdmin
     */
    public function setPlanstinAdmin($planstinAdmin): void
    {
        $this->planstinAdmin = $planstinAdmin;
    }

    /**
     * @return mixed
     */
    public function getContributionAmount()
    {
        return $this->contributionAmount;
    }

    /**
     * @param mixed $contributionAmount
     */
    public function setContributionAmount($contributionAmount): void
    {
        $this->contributionAmount = $contributionAmount;
    }

    /**
     * @return string
     */
    public function getExternalPolicyNumber()
    {
        return $this->externalPolicyNumber;
    }

    /**
     * @param string $externalPolicyNumber
     * @return MemberPlanEnrollment
     */
    public function setExternalPolicyNumber($externalPolicyNumber)
    {
        $this->externalPolicyNumber = $externalPolicyNumber;

        return $this;
    }
}
