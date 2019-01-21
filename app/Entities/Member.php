<?php
/**
 * File: Memberhp
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\MemberRepository")
 * @ORM\Table(name="member")
 */
class Member extends AbstractSalesForceObjectEntity
{
    public const COVERAGE_TIER_EMPLOYEE = 'EE';
    public const COVERAGE_TIER_EMPLOYEE_SPOUSE = 'ES';
    public const COVERAGE_TIER_EMPLOYEE_CHILDREN = 'EC';
    public const COVERAGE_TIER_EMPLOYEE_FAMILY = 'EF';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="GroupClient", inversedBy="members")
     *
     * @var GroupClient
     */
    private $groupClient;

    /**
     * @var string
     */
    private $groupSfId;

    /**
     * @ORM\OneToMany(targetEntity="MemberDependent", mappedBy="member")
     *
     * @var ArrayCollection
     */
    private $dependents;

    /**
     * @ORM\OneToMany(targetEntity="MemberPlanEnrollment", mappedBy="member")
     *
     * @var MemberPlanEnrollment[]|Collection
     */
    private $enrolledPlans;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    private $memberNumber;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $middleInitial;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $socialSecurityNumber;

    /**
     * @var string
     */
    private $hireDate;

    /**
     * @var string
     */
    private $birthDate;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var string
     */
    private $coverageType;


    public function __construct()
    {
        $this->dependents = new ArrayCollection();
    }

    public static function getSfObjectApiName(): string
    {
        return 'Member__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Member';
    }

    public static function getChildRelationships()
    {
        return [
            MemberDependent::class => new SalesForceChildRelationship(
                MemberDependent::class,
                'Member_Dependents',
                'dependents',
                'member'
            ),
            MemberPlanEnrollment::class => new SalesForceChildRelationship(
                MemberPlanEnrollment::class,
                'Member_Plan_Enrollments',
                'enrolledPlans',
                'benefitPlan')
        ];
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Group__c' => 'groupSfId',
            'Prefix__c' => 'prefix',
            'First_Name__c' => 'firstName',
            'Last_Name__c' => 'lastName',
            'Middle_Initial__c' => 'middleInitial',
            'SSN_TIN__c' => 'socialSecurityNumber',
            'Date_Of_Hire__c' => 'hireDate',
            'DOB__c' => 'birthDate',
            'Gender__c' => 'gender',
            'Street_Address__c' => 'address.street1',
            'Street_Address_2__c' => 'address.street2',
            'City__c' => 'address.city',
            'State__c' => 'address.state',
            'Zip_Code__c' => 'address.postalCode',
            'Coverage_Tier__c' => 'coverageType',
            'Email__c' => 'email',
            'Phone__c' => 'phone',
            'Name' => 'memberNumber',

            //Unmapped
            'Accident_Effective__c' => 'Accident_Effective__c',
            'Accident_Plan__c' => 'Accident_Plan__c',
            'Accident_Rate__c' => 'Accident_Rate__c',
            'Accident_Term__c' => 'Accident_Term__c',
            'Catastrophic_Plan__c' => 'Catastrophic_Plan__c',
            'Catastrophic_Plan_Effective__c' => 'Catastrophic_Plan_Effective__c',
            'Catastrophic_Plan_Term__c' => 'Catastrophic_Plan_Term__c',
            'Catastrophic_Rate__c' => 'Catastrophic_Rate__c',
            'Catastrophic_Tier__c' => 'Catastrophic_Tier__c',
            'Critical_Illness__c' => 'Critical_Illness__c',
            'Critical_Illness_Effective__c' => 'Critical_Illness_Effective__c',
            'Critical_Illness_Rate__c' => 'Critical_Illness_Rate__c',
            'Critical_Illness_Term__c' => 'Critical_Illness_Term__c',
            'Dental_Effective__c' => 'Dental_Effective__c',
            'Dental_Plan__c' => 'Dental_Plan__c',
            'Dental_Rate__c' => 'Dental_Rate__c',
            'Dental_Term__c' => 'Dental_Term__c',
            'Dental_Tier__c' => 'Dental_Tier__c',
            'Health_Plan__c' => 'Health_Plan__c',
            'Health_Plan_Effective__c' => 'Health_Plan_Effective__c',
            'Health_Plan_Rate__c' => 'Health_Plan_Rate__c',
            'Health_Plan_Term__c' => 'Health_Plan_Term__c',
            'Health_Tier__c' => 'Health_Tier__c',
            'Legacy_Number__c' => 'Legacy_Number__c',
            'Relationship__c' => 'Relationship__c',
            'Sponsor__c' => 'Sponsor__c',
            'Vision_Effective__c' => 'Vision_Effective__c',
            'Vision_Plan__c' => 'Vision_Plan__c',
            'Vision_Rate__c' => 'Vision_Rate__c',
            'Vision_Term__c' => 'Vision_Term__c',
            'Vision_Tier__c' => 'Vision_Tier__c',
            'Migrated_To_Dependent__c' => 'Migrated_To_Dependent__c',
            'Migrated_Enrolled_Plans__c' => 'Migrated_Enrolled_Plans__c',
            'Migrated_Attachments__c' => 'Migrated_Attachments__c',
        ];
    }

    /**
     * @return GroupClient
     */
    public function getGroupClient(): ?GroupClient
    {
        return $this->groupClient;
    }

    /**
     * @param GroupClient $groupClient
     * @return Member
     */
    public function setGroupClient(GroupClient $groupClient): Member
    {
        $this->groupClient = $groupClient;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupSfId(): string
    {
        if ($this->groupClient && $groupSfId = $this->groupClient->getSfObjectId()) {
            return $groupSfId;
        }

        return $this->groupSfId;
    }

    /**
     * @param string $groupSfId
     */
    public function setGroupSfId(string $groupSfId): void
    {
        if($this->groupClient && !$this->groupClient->getSfObjectId()) {
            $this->groupClient->setSfObjectId($groupSfId);
        }

        $this->groupSfId = $groupSfId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @return Member
     */
    public function setPrefix(?string $prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Member
     */
    public function setFirstName(?string $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Member
     */
    public function setLastName(?string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleInitial(): ?string
    {
        return $this->middleInitial;
    }

    /**
     * @param string $middleInitial
     * @return Member
     */
    public function setMiddleInitial(?string $middleInitial)
    {
        $this->middleInitial = $middleInitial;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Member
     */
    public function setEmail(?string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Member
     */
    public function setPhone(?string $phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getSocialSecurityNumber(): ?string
    {
        return $this->socialSecurityNumber;
    }

    /**
     * @param string $socialSecurityNumber
     * @return Member
     */
    public function setSocialSecurityNumber(?string $socialSecurityNumber)
    {
        $this->socialSecurityNumber = $socialSecurityNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getHireDate(): ?string
    {
        return $this->hireDate;
    }

    /**
     * @param string $hireDate
     * @return Member
     */
    public function setHireDate(?string $hireDate)
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     * @return Member
     */
    public function setBirthDate(?string $birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Member
     */
    public function setGender(?string $gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        if (null === $this->address) {
            $this->address = new Address();
        }

        return $this->address;
    }

    /**
     * @param Address $address
     * @return Member
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getCoverageType(): string
    {
        $dependents = $this->getDependents();

        $hasSpouse = false;
        $hasChildren = false;
        /** @var MemberDependent $dependent */
        foreach($dependents as $dependent) {
            $relation = $dependent->getDependentRelation();
            if ($relation === 'Husband' || $relation === 'Wife') {
                $hasSpouse = true;
            } elseif ($relation === 'Son' || $relation === 'Daughter') {
                $hasChildren = true;
            }
        }

        if ($hasSpouse && $hasChildren) {
            $this->coverageType = Member::COVERAGE_TIER_EMPLOYEE_FAMILY;
        } elseif ($hasSpouse && !$hasChildren) {
            $this->coverageType = Member::COVERAGE_TIER_EMPLOYEE_SPOUSE;
        } elseif (!$hasSpouse && $hasChildren) {
            $this->coverageType = Member::COVERAGE_TIER_EMPLOYEE_CHILDREN;
        } else {
            $this->coverageType = Member::COVERAGE_TIER_EMPLOYEE;
        }

        return $this->coverageType;
    }

    /**
     * @param string $coverageType
     * @return Member
     */
    public function setCoverageType(?string $coverageType)
    {
        $this->coverageType = $coverageType;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getDependents()
    {
        return $this->dependents;
    }

    /**
     * @param Member $dependent
     */
    public function addDependent(MemberDependent $dependent)
    {
        $this->dependents->add($dependent);
        $dependent->setMember($this);
    }

    /**
     * @param Member $dependent
     */
    public function removeDependent(MemberDependent $dependent)
    {
        $this->dependents->removeElement($dependent);
        $dependent->setMember(null);
    }

    public function hasSelfDependent(): bool
    {
        /** @var MemberDependent $dependent */
        foreach($this->dependents as $dependent) {
            if ($dependent->getDependentRelation() === 'Self') {
                return true;
            }
        }

        return false;
    }

    public function createSelfDependent()
    {
        if (!$this->hasSelfDependent()) {

            $selfDependent = new MemberDependent();
            $selfDependent->setDependentRelation('Self')
                ->setMember($this)
                ->setFirstName($this->getFirstName())
                ->setLastName($this->getLastName())
                ->setMiddleName($this->getMiddleInitial())
                ->setDob($this->getBirthDate())
                ->setGender($this->getGender())
                ->setSocialSecurityNumber($this->getSocialSecurityNumber());
        }

        return $selfDependent;
    }

    /**
     * @return MemberPlanEnrollment[]|Collection
     */
    public function getEnrolledPlans()
    {
        return $this->enrolledPlans;
    }

    /**
     * @param MemberPlanEnrollment[]|Collection $enrolledPlans
     */
    public function setEnrolledPlans($enrolledPlans): void
    {
        $this->enrolledPlans = $enrolledPlans;
    }

    /**
     * @param MemberPlanEnrollment $enrolledPlan
     */
    public function addEnrolledPlan(MemberPlanEnrollment $enrolledPlan)
    {
        $this->enrolledPlans->add($enrolledPlan);
        $enrolledPlan->setMember($this);
    }

    /**
     * @param MemberPlanEnrollment $enrolledPlan
     */
    public function removeEnrolledPlan(MemberPlanEnrollment $enrolledPlan)
    {
        $this->enrolledPlans->removeElement($enrolledPlan);
        $enrolledPlan->setMember(null);
    }

    /**
     * @return string
     */
    public function getMemberNumber():? string
    {
        return $this->memberNumber;
    }

    /**
     * @param string $memberNumber
     * @return Member
     */
    public function setMemberNumber(string $memberNumber)
    {
        $this->memberNumber = $memberNumber;

        return $this;
    }
}
