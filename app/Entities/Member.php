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
class Member extends AbstractSalesForceObjectEntity
{
    protected static $sfObjectFriendlyName = 'Member';

    protected static $sfObjectApiName = 'Member__c';

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
     * @var Contact
     *
     * @ORM\OneToOne(targetEntity="Contact", mappedBy="member")
     */
    private $primaryContact;

    /**
     * @var Member
     * @ORM\OneToOne(targetEntity="App\Entities\User", mappedBy="user")
     */
    private $member;

    /**
     * @var string
     */
    protected $memberRoll;

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
        ];
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
     * @return GroupClient
     */
    public function getGroupClient(): GroupClient
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
}
