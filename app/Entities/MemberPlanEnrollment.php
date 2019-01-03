<?php
/**
 * File: MemberPlanEntrollment.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


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
     * @var Member
     *
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="enrolledPlans")
     */
    private $member;

    /**
     * @var InsurancePlan
     *
     * @ORM\ManyToOne(targetEntity="InsurancePlan", inversedBy="memberEnrollments")
     */
    private $insurancePlan;

    private $planeTermEnd;

    private $planEffectiveDate;

    private $planRate;

    private $coverageTier;

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
    public function getInsurancePlan()
    {
        return $this->insurancePlan;
    }

    /**
     * @param mixed $insurancePlan
     * @return MemberPlanEnrollment
     */
    public function setInsurancePlan($insurancePlan)
    {
        $this->insurancePlan = $insurancePlan;

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
}
