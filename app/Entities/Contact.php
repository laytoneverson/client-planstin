<?php
/**
 * File: Contact.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\ContactRepository")
 * @ORM\Table(name="contact")
 */
class Contact extends AbstractSalesForceObjectEntity
{
    protected static $sfObjectApiName = 'Contact';

    protected static $sfFriendlyName = 'Contact';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var GroupClient
     *
     * @ORM\OneToOne(targetEntity="GroupClient", mappedBy="primaryContact", cascade={"persist", "remove"})
     */
    protected $groupClient;

    /**
     * @var Member
     *
     * @ORM\OneToOne(targetEntity="Member", inversedBy="primaryContact")
     */
    protected $member;

    protected $firstName;

    protected $lastName;

    protected $phone;

    protected $email;

    public static function getSfObjectApiName(): string
    {
        return self::$sfObjectApiName;
    }

    public static function getSfObjectFriendlyName(): string
    {
        return self::$sfFriendlyName;
    }

    public static function getSfMapping(): array
    {
        return [
            //SF => Local
            'AccountId' => 'groupClient.sfObjectId',
            'LastName' => 'firstName',
            'FirstName' => 'lastName',
            'Phone' => 'phone',
            'Email' => 'email',
        ];
    }

    public function getFullName()
    {
        return \sprintf('%s %s', $this->firstName, $this->lastName);
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
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

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
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

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
     * @return Contact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return GroupClient
     */
    public function getGroupClient():? GroupClient
    {
        return $this->groupClient;
    }

    /**
     * @param GroupClient $groupClient
     * @return Contact
     */
    public function setGroupClient(GroupClient $groupClient): self
    {
        $this->groupClient = $groupClient;

        return $this;
    }

    /**
     * @return Member
     */
    public function getMember():? Member
    {
        return $this->member;
    }

    /**
     * @param Member $member
     * @return Contact
     */
    public function setMember(Member $member): self
    {
        $this->member = $member;

        return $this;
    }
}
