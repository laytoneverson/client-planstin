<?php
/**
 * File: BusinessClient.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\GroupClientRepository")
 * @ORM\Table(name="group_client")
 */
class GroupClient extends AbstractSalesForceObjectEntity
{
    protected static $sfObjectApiName = 'Account';

    protected static $sfObjectFriendlyName = 'Group Client';

    public const ENROLL_STEP_PROFILE = 'profile';
    public const ENROLL_STEP_SERVICES = 'services';
    public const ENROLL_STEP_AGREEMENT = 'agreement';
    public const ENROLL_STEP_BILLING = 'billing';
    public const ENROLL_STEP_EMPLOYEES = 'employees';
    public const ENROLL_STEP_COMPLETE = 'complete';

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Member", mappedBy="groupClient")
     *
     * @var ArrayCollection|Member[]
     */
    private $members;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\User", mappedBy="adminOf")
     *
     * @var ArrayCollection
     */
    private $adminUsers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\User", mappedBy="groupClient")
     *
     * @var ArrayCollection
     */
    private $users;

    /**
     * @var Broker
     *
     * @ORM\OneToOne(targetEntity="Broker", inversedBy="groupClient")
     */
    private $broker;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="GroupClientPlanOffered", mappedBy="groupClient")
     */
    private $plansOffered;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string
     */
    protected $signupStep = self::ENROLL_STEP_PROFILE;

    /**
     * @var string
     */
    private $groupNumber;

    /**
     * @var string
     */
    private $dba;

    /**
     * @var string
     */
    private $website;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $taxId;

    /**
     * @var Address
     */
    private $shippingAddress;

    /**
     * @var Address
     */
    private $billingAddress;

    /**
     * @var Contact
     *
     * @ORM\OneToOne(targetEntity="Contact", inversedBy="groupClient", cascade={"persist", "remove"})
     */
    private $primaryContact;

    /**
     * @var Contact
     */
    private $billingContact;

    /**
     * @var string
     */
    private $profileImageUpload;

    /**
     * @var string
     */
    private $profileImagePath;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $profileImageUrl;

    /**
     * @var bool
     */
    private $isPayrollClient;

    /**
     * @var bool
     */
    private $isBenefitsClient;

    /**
     * @var bool
     */
    private $agreementComplete = false;

    /**
     * GroupClient constructor.
     */
    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->adminUsers = new ArrayCollection();
        $this->plansOffered = new ArrayCollection();
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
            'Name' => 'dba',
            'Company_DBA__c' => 'dba',
            'Employer_Tax_ID_FEIN__c' => 'taxId',
            'Phone' => 'phone',
            'Website' => 'website',

            'BillingStreet' => 'billingAddress.fullStreet',
            'BillingCity' => 'billingAddress.city',
            'BillingState' => 'billingAddress.state',
            'BillingPostalCode' => 'billingAddress.postalCode',

            'ShippingStreet' => 'shippingAddress.fullStreet',
            'ShippingCity' => 'shippingAddress.city',
            'ShippingState' => 'shippingAddress.state',
            'ShippingPostalCode' => 'shippingAddress.postalCode',

            'Benefits_Client__c' => 'isBenefitsClient',
            'Payroll_Client__c' => 'isPayrollClient',
            'Agreement_Complete__c' => 'agreementComplete',
        ];
    }

    /**
     * @return int
     */
    public function getId():? int
    {
        return $this->id;
    }

    /**
     * Get the value of signupStep
     *
     * @return  string
     */ 
    public function getSignupStep(): string
    {
        return $this->signupStep;
    }

    /**
     * Set the value of signupStep
     *
     * @param string  $signupStep
     *
     * @return self
     */ 
    public function setSignupStep(string $signupStep)
    {
        $this->signupStep = $signupStep;

        return $this;
    }

    /**
     * @param Member $member
     * @return GroupClient
     */
    public function addMember(Member $member)
    {
        $member->setGroupClient($this);

        return $this;
    }

    /**
     * @param Member $member
     * @return GroupClient
     */
    public function removeMember(Member $member)
    {
        $this->members->removeElement($member);

        return $this;
    }

    /**
     * @param User $adminUser
     * @return GroupClient
     */
    public function addAdminUser(User $adminUser)
    {
        $this->adminUsers->add($adminUser);

        return $this;
    }

    /**
     * @param User $adminUser
     * @return GroupClient
     */
    public function removeAdminUser($adminUser)
    {
        $this->adminUsers->removeElement($adminUser);
        $adminUser->setAdminOf(null);

        return $this;
    }

    /**
     * @return string
     */
    public function getDba():? string
    {
        return $this->dba;
    }

    /**
     * @param string $dba
     * @return GroupClient
     */
    public function setDba(string $dba = null)
    {
        $this->dba = $dba;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite():? string
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return GroupClient
     */
    public function setWebsite(string $website = null)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone():? string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return GroupClient
     */
    public function setPhone(string $phone = null)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxId():? string
    {
        return $this->taxId;
    }

    /**
     * @param string $taxId
     * @return GroupClient
     */
    public function setTaxId(string $taxId = null)
    {
        $this->taxId = $taxId;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getPrimaryContact():? Contact
    {
        return $this->primaryContact;
    }

    /**
     * @param Contact $primaryContact
     * @return GroupClient
     */
    public function setPrimaryContact(Contact $primaryContact)
    {
        $this->primaryContact = $primaryContact;
        $primaryContact->setGroupClient($this);

        return $this;
    }

    /**
     * @return Contact
     */
    public function getBillingContact():? Contact
    {
        return $this->billingContact;
    }

    /**
     * @param Contact $billingContact
     * @return GroupClient
     */
    public function setBillingContact(Contact $billingContact)
    {
        $this->billingContact = $billingContact;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfileImageUpload():? string
    {
        return $this->profileImageUpload;
    }

    /**
     * @param string $profileImageUpload
     * @return GroupClient
     */
    public function setProfileImageUpload(string $profileImageUpload = null)
    {
        $this->profileImageUpload = $profileImageUpload;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfileImagePath():? string
    {
        return $this->profileImagePath;
    }

    /**
     * @param string $profileImagePath
     * @return GroupClient
     */
    public function setProfileImagePath(string $profileImagePath = null)
    {
        $this->profileImagePath = $profileImagePath;

        return $this;
    }

    /**
     * @return Address
     */
    public function getShippingAddress():? Address
    {
        if (null === $this->shippingAddress) {
            $this->shippingAddress = new Address();
        }

        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     * @return GroupClient
     */
    public function setShippingAddress(Address $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return Address
     */
    public function getBillingAddress(): Address
    {
        if (null === $this->billingAddress) {
            $this->billingAddress = new Address();
        }

        return $this->billingAddress;
    }

    /**
     * @param Address $billingAddress
     * @return GroupClient
     */
    public function setBillingAddress(Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getProfileImageUrl():? string
    {
        return $this->profileImageUrl;
    }

    /**
     * @param string $profileImageUrl
     * @return GroupClient
     */
    public function setProfileImageUrl(string $profileImageUrl)
    {
        $this->profileImageUrl = $profileImageUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroupNumber():? string
    {
        return $this->groupNumber;
    }

    /**
     * @param string $groupNumber
     * @return GroupClient
     */
    public function setGroupNumber(string $groupNumber = null)
    {
        $this->groupNumber = $groupNumber;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPayrollClient(): bool
    {
        return $this->isPayrollClient;
    }

    /**
     * @param bool $isPayrollClient
     */
    public function setIsPayrollClient(bool $isPayrollClient): void
    {
        $this->isPayrollClient = $isPayrollClient;
    }

    /**
     * @return bool
     */
    public function isBenefitsClient(): bool
    {
        return $this->isBenefitsClient;
    }

    /**
     * @param bool $isBenefitsClient
     */
    public function setIsBenefitsClient(bool $isBenefitsClient)
    {
        $this->isBenefitsClient = $isBenefitsClient;

        return $this;
    }

    /**
     * @return Broker
     */
    public function getBroker(): Broker
    {
        return $this->broker;
    }

    /**
     * @param Broker $broker
     * @return GroupClient
     */
    public function setBroker(Broker $broker)
    {
        $this->broker = $broker;

        return $this;
    }

    /**
     * @param GroupClientPlanOffered $plansOffered
     */
    public function addPlansOffered($plansOffered)
    {
        $this->plansOffered->add($plansOffered);
        // uncomment if you want to update other side
        $plansOffered->setGroupClient($this);
    }

    /**
     * @param mixed $plansOffered
     */
    public function removePlansOffered(GroupClientPlanOffered $plansOffered)
    {
        $this->plansOffered->removeElement($plansOffered);
        // uncomment if you want to update other side
        $plansOffered->setGroupClient(null);
    }

    /**
     * @return ArrayCollection
     */
    public function getPlansOffered(): Collection
    {
        if (null === $this->plansOffered) {
            $this->plansOffered = new ArrayCollection();
        }

        return $this->plansOffered;
    }

    /**
     * @return bool
     */
    public function isAgreementComplete(): bool
    {
        return $this->agreementComplete;
    }

    /**
     * @param bool $agreementComplete
     */
    public function setAgreementComplete(bool $agreementComplete = false)
    {
        $this->agreementComplete = $agreementComplete;
    }
}
