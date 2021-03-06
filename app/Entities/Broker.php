<?php
/**
 * File: Broker.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\BrokerRepository")
 * @ORM\Table(name="broker")
 */
class Broker extends AbstractSalesForceObjectEntity
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var GroupClient[]|Collection
     * @ORM\OneToMany(targetEntity="GroupClient", mappedBy="broker")
     */
    private $groupClients;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="broker")
     *
     * @var User[]|ArrayCollection
     */
    private $users;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $affiliateName;

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
    private $notes;

    private $bankName;

    private $routingNumber;

    private $accountNumber;

    private $accountType;

    public static function getSfObjectApiName(): string
    {
        return 'Affiliates__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Affiliate / Broker';
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Address__c' => 'address',
            'Name' => 'affiliateName',
            'Email__c' => 'email',
            'Phone__c' => 'phone',
            'Notes_Section__c' => 'notes',
            'ACH_Account_Number__c' => 'accountNumber',
            'ACH_Routing_Number__c' => 'routingNumber',
            'ACH_Account_Type__c' => 'accountType',
            'ACH_Bank_Name__c' => 'bankName'
        ];
    }

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->groupClients = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Broker
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return GroupClient[]|Collection
     */
    public function getGroupClient(): Collection
    {
        return $this->groupClients;
    }

    /**
     * @return GroupClient[]|Collection
     */
    public function getGroupClients()
    {
        return $this->groupClients;
    }

    /**
     * @param GroupClient[]|Collection $groupClients
     * @return Broker
     */
    public function setGroupClients($groupClients)
    {
        $this->groupClients = $groupClients;

        return $this;
    }

    /**
     * @param GroupClient $groupClient
     */
    public function addGroupClient(GroupClient $groupClient)
    {
        $this->groupClients->add($groupClient);
    }

    /**
     * @param GroupClient $groupClient
     */
    public function removeGroupClient(GroupClient $groupClient)
    {
        $this->groupClients->removeElement($groupClient);
    }


    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Broker
     */
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAffiliateName(): string
    {
        return $this->affiliateName;
    }

    /**
     * @param string $affiliateName
     * @return Broker
     */
    public function setAffiliateName(string $affiliateName)
    {
        $this->affiliateName = $affiliateName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Broker
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Broker
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Broker
     */
    public function setNotes(string $notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return User[]|ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User[]|ArrayCollection $users
     * @return Broker
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     * @return Broker
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoutingNumber()
    {
        return $this->routingNumber;
    }

    /**
     * @param string $routingNumber
     * @return Broker
     */
    public function setRoutingNumber($routingNumber)
    {
        $this->routingNumber = $routingNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     * @return Broker
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param string $accountType
     * @return Broker
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->users->add($user);
    }

    /**
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
    }
}
