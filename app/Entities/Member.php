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
    protected static $sfObjectFriendlyName = 'Member';

    protected static $sfObjectApiName = 'Member__c';

    public const COVERAGE_TIER_EMPLOYEE = 'Employee';
    public const COVERAGE_TIER_EMPLOYEE_SPOUSE = 'Employee';
    public const COVERAGE_TIER_EMPLOYEE_CHILDREN = 'Employee';
    public const COVERAGE_TIER_EMPLOYEE_FAMILY = 'Employee';

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="GroupClient", inversedBy="members")
     * @var GroupClient
     */
    private $groupClient;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="MemberDependent", mappedBy="member")
     */
    private $dependents;

    /**
     * @var MemberPlanEnrollment[]|Collection
     *
     * @ORM\OneToMany(targetEntity="MemberPlanEnrollment", mappedBy="member")
     */
    private $enrolledPlans;

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
     * @ORM\Column(type="string")
     */
    private $gender;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $coverageType;


    public function __construct()
    {
        $this->dependents = new ArrayCollection();
    }

    public static function getSfObjectApiName(): string
    {
        return self::$sfObjectApiName;
    }

    public static function getSfObjectFriendlyName(): string
    {
        return self::$sfObjectFriendlyName;
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Group__c' => 'groupClient.sfObjectId',
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
            if ($dependent->getDependentRelation() === 'Spouse') {
                $hasSpouse = true;
            } elseif ($dependent->getDependentRelation() === 'Child') {
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
}
