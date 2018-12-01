<?php
/**
 * File: BusinessClient.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\ClientRepository")
 * @ORM\Table(name="client")
 */
class Client
{
    use IsSalesForceObjectTrait;

    public const ENROLL_STEP_PROFILE = "profile";
    public const ENROLL_STEP_SERVICES = "services";
    public const ENROLL_STEP_AGREEMENT = "agreement";
    public const ENROLL_STEP_BILLING = "billing";
    public const ENROLL_STEP_EMPLOYEES = "employees";
    public const ENROLL_STEP_COMPLETE = "complete";

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entities\Member", mappedBy="client")
     * @var ArrayCollection|Member[]
     */
    protected $members;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entities\User", mappedBy="adminOf")
     */
    protected $adminUsers;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $signupStep = self::ENROLL_STEP_PROFILE;

    /**
     * @var Business
     */
    private $business;

    private $accountOwner;

    private $accountName;

    private $parentAccount;

    private $groupNumber;

    protected $affiliateAssigned;

    protected $groupBillingMethod;

    protected $groupNotes;

    protected $groupSitusState;

    protected $lagacyGroupNumber;

    public function __construct()
    {
        $this->members = new ArrayCollection();
    }

    
    /**
     * Get the value of signupStep
     *
     * @return  string
     */ 
    public function getSignupStep()
    {
        return $this->signupStep;
    }

    /**
     * Set the value of signupStep
     *
     * @param  string  $signupStep
     *
     * @return  self
     */ 
    public function setSignupStep(string $signupStep)
    {
        $this->signupStep = $signupStep;

        return $this;
    }
    
    /**
     * Get the value of business
     *
     * @return  Business
     */ 
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Set the value of business
     *
     * @param  Business  $business
     *
     * @return  self
     */ 
    public function setBusiness(Business $business)
    {
        $this->business = $business;

        return $this;
    }

    /**
     * Get the value of accountOwner
     */ 
    public function getAccountOwner()
    {
        return $this->accountOwner;
    }

    /**
     * Set the value of accountOwner
     *
     * @return  self
     */ 
    public function setAccountOwner($accountOwner)
    {
        $this->accountOwner = $accountOwner;

        return $this;
    }
}
