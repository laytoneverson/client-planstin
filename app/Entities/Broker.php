<?php
/**
 * File: Broker.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
     * @var GroupClient
     * @ORM\OneToOne(targetEntity="GroupClient", mappedBy="broker")
     */
    private $groupClient;

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
     * @return GroupClient
     */
    public function getGroupClient(): GroupClient
    {
        return $this->groupClient;
    }

    /**
     * @param GroupClient $groupClient
     * @return Broker
     */
    public function setGroupClient(GroupClient $groupClient)
    {
        $this->groupClient = $groupClient;

        return $this;
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
}
