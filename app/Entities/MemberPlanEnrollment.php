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
 * @ORM\Entity(repositoryClass="App\Repositories\MemberDependentRepository")
 * @ORM\Table(name="member_plan_entrollment")
 */
class MemberPlanEnrollment
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

    /**
     * @ORM\ManyToOne(targetEntity="BenefitPlan", inversedBy="memberEnrollments")
     *
     * @var BenefitPlan
     */
    private $benefitPlan;

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
}
