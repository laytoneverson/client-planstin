<?php
/**
 * File: MemberDependent.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\MemberDependentRepository")
 * @ORM\Table(name="member_dependent")
 */
class MemberDependent extends AbstractSalesForceObjectEntity
{
    public static $dependentRelations = [
        'Self', 'Husband', 'Wife', 'Son', 'Daughter'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="dependents")
     *
     * @var Member
     */
    private $member;

    private $memberSfId;

    /**
     * @ORM\OneToMany(targetEntity="DependentPlanEnrollment", mappedBy="memberDependent")
     *
     * @var DependentPlanEnrollment[]|Collection
     */
    private $dependentPlanEnrollments;

    private $dob;

    private $dependentNumber;

    private $firstName;

    private $middleName;

    private $lastName;

    private $prefix;

    private $gender;

    private $socialSecurityNumber;

    private $dependentRelation = 'Self';

    public static function getSfObjectApiName(): string
    {
        return 'Member_Dependent__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Member Dependent';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Member__c' => 'memberSfId',
            'Date_Of_Birth__c' => 'dob',
            'Name' => 'dependentNumber',
            'First_Name__c' => 'firstName',
            'Middle_Name__c' => 'middleName',
            'Last_Name__c' => 'lastName',
            'Gender__c' => 'gender',
            'SSN_TIN__c' => 'socialSecurityNumber',
            'Dependents_Relation__c' => 'dependentsRelation',
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
     * @return Member
     */
    public function getMember(): ?Member
    {
        return $this->member;
    }

    /**
     * @param Member $member
     * @return MemberDependent
     */
    public function setMember(Member $member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return string
     */
    public function getMemberSfId()
    {
        //If a member is set we will return its object ID first.
        if ($this->member && $memberId = $this->member->getSfObjectId()) {
            return $memberId;
        }

        return $this->memberSfId;
    }

    /**
     * @param string $memberSfId
     * @return MemberDependent
     */
    public function setMemberSfId($memberSfId)
    {
        if ($this->member && !$this->member->getSfObjectId()) {
            $this->member->setSfObjectId($memberSfId);
        }

        $this->memberSfId = $memberSfId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     * @return MemberDependent
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDependentNumber()
    {
        return $this->dependentNumber;
    }

    /**
     * @param mixed $dependentNumber
     * @return MemberDependent
     */
    public function setDependentNumber($dependentNumber)
    {
        $this->dependentNumber = $dependentNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return MemberDependent
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param mixed $middleName
     * @return MemberDependent
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return MemberDependent
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return MemberDependent
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSocialSecurityNumber()
    {
        return $this->socialSecurityNumber;
    }

    /**
     * @param mixed $socialSecurityNumber
     * @return MemberDependent
     */
    public function setSocialSecurityNumber($socialSecurityNumber)
    {
        $this->socialSecurityNumber = $socialSecurityNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDependentRelation()
    {
        return $this->dependentRelation;
    }

    /**
     * @param mixed $dependentRelation
     * @return MemberDependent
     */
    public function setDependentRelation($dependentRelation)
    {
        $this->dependentRelation = $dependentRelation;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix(?string $prefix): void
    {
        $this->prefix = $prefix;
    }


}
