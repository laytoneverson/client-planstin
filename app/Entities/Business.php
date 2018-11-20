<?php
/**
 * File: Business.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


class Business
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $dba;

    protected $website;

    protected $phone;

    protected $taxId;

    /**
     * @var Address
     */
    protected $mailingAddress;

    /**
     * @var Address
     */
    protected $physicalAddress;

    /**
     * @var Contact
     */
    protected $primaryContact;

    /**
     * @var Contact
     */
    protected $billingContact;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Business
     */
    public function setName($name): ?Business
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDba()
    {
        return $this->dba;
    }

    /**
     * @param mixed $dba
     * @return Business
     */
    public function setDba($dba): ?Business
    {
        $this->dba = $dba;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     * @return Business
     */
    public function setWebsite($website): ?Business
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return Business
     */
    public function setPhone($phone): ?Business
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * @param mixed $taxId
     * @return Business
     */
    public function setTaxId($taxId): ?Business
    {
        $this->taxId = $taxId;

        return $this;
    }

    /**
     * @return Address
     */
    public function getMailingAddress(): ?Address
    {
        return $this->mailingAddress;
    }

    /**
     * @param Address $mailingAddress
     * @return Business
     */
    public function setMailingAddress(Address $mailingAddress):? Business
    {
        $this->mailingAddress = $mailingAddress;

        return $this;
    }

    /**
     * @return Address
     */
    public function getPhysicalAddress():? Address
    {
        return $this->physicalAddress;
    }

    /**
     * @param Address $physicalAddress
     * @return Business
     */
    public function setPhysicalAddress(Address $physicalAddress):? Business
    {
        $this->physicalAddress = $physicalAddress;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getPrimaryContact(): ?Contact
    {
        return $this->primaryContact;
    }

    /**
     * @param Contact $primaryContact
     * @return Business
     */
    public function setPrimaryContact(Contact $primaryContact):? Business
    {
        $this->primaryContact = $primaryContact;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getBillingContact(): ?Contact
    {
        return $this->billingContact;
    }

    /**
     * @param Contact $billingContact
     * @return Business
     */
    public function setBillingContact(Contact $billingContact):? Business
    {
        $this->billingContact = $billingContact;

        return $this;
    }
}
