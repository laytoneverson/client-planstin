<?php
/**
 * File: PaymentMethod.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\PaymentMethodRepository")
 * @ORM\Table(name="payment_method")
 */
class PaymentMethod extends AbstractSalesForceObjectEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var GroupClient
     *
     * @ORM\ManyToOne(targetEntity="GroupClient", inversedBy="paymentMethods")
     */
    private $groupClient;

    /**
     * @var string
     */
    private $billingFirstName;

    /**
     * @var string
     */
    private $billingLastName;

    /**
     * @var string
     */
    private $billingAddress1;

    /**
     * @var string
     */
    private $billingAddress2;

    /**
     * @var string
     */
    private $billingCity;

    /**
     * @var string
     */
    private $billingState;

    /**
     * @var string
     */
    private $billingZip;

    /**
     * @var string
     */
    private $billingEmail;

    /**
     * @var string
     */
    private $billingPhone;

    /**
     * @var string
     */
    private $creditCardType;

    /**
     * @var string
     */
    private $creditCardNumber;

    /**
     * @var string
     */
    private $creditCardExpMonth;

    /**
     * @var string
     */
    private $creditCardExpYear;

    /**
     * @var string
     */
    private $achAccountType;

    /**
     * @var string
     */
    private $achAccountBank;

    /**
     * @var string
     */
    private $achAccountNumber;

    /**
     * @var string
     */
    private $achAccountRoutingNumber;


    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Payment_Method__c';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Payment Method';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'ACH_Account_Number__c' => 'achAccountNumber',
            'ACH_Account_Type__c' => 'achAccountType',
            'ACH_Bank_Name__c' => 'achAccountBank',
            'ACH_Routing_Number__c' => 'achAccountRoutingNumber',
            'Billing_Address_1__c' => 'billingAddress1',
            'Billing_Address_2__c' => 'billingAddress2',
            'Billing_City__c' => 'billingCity',
            'Billing_Email__c' => 'billingEmail',
            'Billing_First_Name__c' => 'billingFirstName',
            'Billing_Last_Name__c' => 'billingLastName',
            'Billing_Phone__c' => 'billingPhone',
            'Billing_State__c' => 'billingState',
            'Billing_Zip__c' => 'billingZip',
            'Card_Exp_Month__c' => 'creditCardExpMonth',
            'Card_Exp_Year__c' => 'creditCardExpYear',
            'Card_Number__c' => 'creditCardNumber',
            'Card_Type__c' => 'creditCardType',
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return GroupClient
     */
    public function getGroupClient(): GroupClient
    {
        return $this->groupClient;
    }

    /**
     * @param GroupClient $groupclient
     * @return PaymentMethod
     */
    public function setGroupClient(GroupClient $groupClient)
    {
        $this->groupClient = $groupClient;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingFirstName(): ?string
    {
        return $this->billingFirstName;
    }

    /**
     * @param string $billingFirstName
     * @return PaymentMethod
     */
    public function setBillingFirstName(string $billingFirstName)
    {
        $this->billingFirstName = $billingFirstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingLastName(): ?string
    {
        return $this->billingLastName;
    }

    /**
     * @param string $billingLastName
     * @return PaymentMethod
     */
    public function setBillingLastName(string $billingLastName)
    {
        $this->billingLastName = $billingLastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress1(): ?string
    {
        return $this->billingAddress1;
    }

    /**
     * @param string $billingAddress1
     * @return PaymentMethod
     */
    public function setBillingAddress1(string $billingAddress1)
    {
        $this->billingAddress1 = $billingAddress1;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingAddress2(): ?string
    {
        return $this->billingAddress2;
    }

    /**
     * @param string $billingAddress2
     * @return PaymentMethod
     */
    public function setBillingAddress2(string $billingAddress2)
    {
        $this->billingAddress2 = $billingAddress2;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingCity(): ?string
    {
        return $this->billingCity;
    }

    /**
     * @param string $billingCity
     * @return PaymentMethod
     */
    public function setBillingCity(string $billingCity)
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingState(): ?string
    {
        return $this->billingState;
    }

    /**
     * @param string $billingState
     * @return PaymentMethod
     */
    public function setBillingState(string $billingState)
    {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingZip(): ?string
    {
        return $this->billingZip;
    }

    /**
     * @param string $billingZip
     * @return PaymentMethod
     */
    public function setBillingZip(string $billingZip)
    {
        $this->billingZip = $billingZip;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingEmail(): ?string
    {
        return $this->billingEmail;
    }

    /**
     * @param string $billingEmail
     * @return PaymentMethod
     */
    public function setBillingEmail(string $billingEmail)
    {
        $this->billingEmail = $billingEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingPhone(): ?string
    {
        return $this->billingPhone;
    }

    /**
     * @param string $billingPhone
     * @return PaymentMethod
     */
    public function setBillingPhone(string $billingPhone)
    {
        $this->billingPhone = $billingPhone;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardType(): ?string
    {
        return $this->creditCardType;
    }

    /**
     * @param string $creditCardType
     * @return PaymentMethod
     */
    public function setCreditCardType(string $creditCardType)
    {
        $this->creditCardType = $creditCardType;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardNumber(): ?string
    {
        return $this->creditCardNumber;
    }

    /**
     * @param string $creditCardNumber
     * @return PaymentMethod
     */
    public function setCreditCardNumber(string $creditCardNumber)
    {
        $this->creditCardNumber = $creditCardNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardExpMonth(): ?string
    {
        return $this->creditCardExpMonth;
    }

    /**
     * @param string $creditCardExpMonth
     * @return PaymentMethod
     */
    public function setCreditCardExpMonth(string $creditCardExpMonth)
    {
        $this->creditCardExpMonth = $creditCardExpMonth;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditCardExpYear(): ?string
    {
        return $this->creditCardExpYear;
    }

    /**
     * @param string $creditCardExpYear
     * @return PaymentMethod
     */
    public function setCreditCardExpYear(string $creditCardExpYear)
    {
        $this->creditCardExpYear = $creditCardExpYear;

        return $this;
    }

    /**
     * @return string
     */
    public function getAchAccountType(): ?string
    {
        return $this->achAccountType;
    }

    /**
     * @param string $achAccountType
     * @return PaymentMethod
     */
    public function setAchAccountType(string $achAccountType)
    {
        $this->achAccountType = $achAccountType;

        return $this;
    }

    /**
     * @return string
     */
    public function getAchAccountBank(): ?string
    {
        return $this->achAccountBank;
    }

    /**
     * @param string $achAccountBank
     * @return PaymentMethod
     */
    public function setAchAccountBank(string $achAccountBank)
    {
        $this->achAccountBank = $achAccountBank;

        return $this;
    }

    /**
     * @return string
     */
    public function getAchAccountNumber(): ?string
    {
        return $this->achAccountNumber;
    }

    /**
     * @param string $achAccountNumber
     * @return PaymentMethod
     */
    public function setAchAccountNumber(string $achAccountNumber)
    {
        $this->achAccountNumber = $achAccountNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getAchAccountRoutingNumber(): ?string
    {
        return $this->achAccountRoutingNumber;
    }

    /**
     * @param string $achAccountRoutingNumber
     * @return PaymentMethod
     */
    public function setAchAccountRoutingNumber(string $achAccountRoutingNumber)
    {
        $this->achAccountRoutingNumber = $achAccountRoutingNumber;

        return $this;
    }
}
