<?php
/**
 * File: DependentPlanEnrollment.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dependent_plan_enrollment")
 */
class DependentPlanEnrollment extends AbstractSalesForceObjectEntity
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var MemberDependent
     * @ORM\ManyToOne(targetEntity="MemberDependent", inversedBy="dependentPlanEnrollments")
     */
    private $memberDependent;

    private $memberDependentSfId;

    /**
     * @var MemberPlanEnrollment
     * @ORM\ManyToOne(targetEntity="MemberPlanEnrollment", inversedBy="dependentPlanEnrollments")
     */
    private $memberPlanEnrollment;

    private $memberPlanEnrollmentSfId;

    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Dependent_Plan_Enrollment__c';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Dependent Plan Enrollment';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Member_Dependent__c' => 'memberDependentSfId',
            'Member_Plan__c' => 'memberPlanEnrollmentSfId',
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
     * @return MemberDependent
     */
    public function getMemberDependent()
    {
        return $this->memberDependent;
    }

    /**
     * @param MemberDependent $memberDependent
     * @return DependentPlanEnrollment
     */
    public function setMemberDependent(MemberDependent $memberDependent)
    {
        $this->memberDependent = $memberDependent;

        return $this;
    }

    /**
     * @return string
     */
    public function getMemberDependentSfId()
    {
        if ($this->memberDependent) {
            return $this->memberDependent->getSfObjectId();
        }

        return $this->memberDependentSfId;
    }

    /**
     * @param mixed $memberDependentSfId
     */
    public function setMemberDependentSfId($memberDependentSfId): void
    {
        $this->memberDependentSfId = $memberDependentSfId;
    }

    /**
     * @return MemberPlanEnrollment
     */
    public function getMemberPlanEnrollment()
    {
        return $this->memberPlanEnrollment;
    }

    /**
     * @param MemberPlanEnrollment $memberPlanEnrollment
     * @return DependentPlanEnrollment
     */
    public function setMemberPlanEnrollment(MemberPlanEnrollment $memberPlanEnrollment)
    {
        $this->memberPlanEnrollment = $memberPlanEnrollment;

        return $this;
    }

    /**
     * @return string
     */
    public function getMemberPlanEnrollmentSfId()
    {
        if ($this->memberPlanEnrollment) {
            return $this->memberPlanEnrollment->getSfObjectId();
        }

        return $this->memberPlanEnrollmentSfId;
    }

    /**
     * @param string $memberPlanEnrollmentSfId
     */
    public function setMemberPlanEnrollmentSfId($memberPlanEnrollmentSfId)
    {
        $this->memberPlanEnrollmentSfId = $memberPlanEnrollmentSfId;
    }
}
