<?php
/**
 * File: Memberhp
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\MemberRepository")
 * @ORM\Table(name="member")
 */
class Member
{
    use IsSalesForceObjectTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Client", inversedBy="members")
     * @var Client
     */
    private $client;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var Member
     * @ORM\OneToOne(targetEntity="App\Entities\User", mappedBy="user")
     */
    private $member;

    /**
     * @var string
     */
    protected $memberRoll;

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Member
     */
    public function setContact(Contact $contact): Member
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return string
     */
    public function getMemberRoll(): string
    {
        return $this->memberRoll;
    }

    /**
     * @param string $memberRoll
     * @return Member
     */
    public function setMemberRoll(string $memberRoll): Member
    {
        $this->memberRoll = $memberRoll;

        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return Member
     */
    public function setClient(Client $client): Member
    {
        $this->client = $client;

        return $this;
    }
}
