<?php
/**
 * File: User.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable;
use LaravelDoctrine\ORM\Auth\Authenticatable as AuthenticatableTrait;

/**
 * Class User
 *
 * @package App\Entities
 * @ORM\Entity(repositoryClass="App\Repositories\UserRepository")
 * @ORM\Table(name="app_user")
 */
class User implements Authenticatable, CanResetPassword
{
    use AuthenticatableTrait, CanResetPasswordTrait;

    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\GroupClient", inversedBy="users")
     *
     * @var GroupClient|null
     */
    private $groupClient;

    /**
     * @ORM\OneToOne(targetEntity="App\Entities\Member", inversedBy="user")
     *
     * @var Member|null
     */
    private $member;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\Broker", inversedBy="users")
     *
     * @var Broker
     */
    private $broker;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entities\GroupClient", inversedBy="adminUsers")
     *
     * @var GroupClient
     */
    private $adminOf;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @return int
     */
    public function getId():? int
    {
        return $this->id;
    }

    /**
     * @return GroupClient
     */
    public function getGroupClient():? GroupClient
    {
        return $this->groupClient;
    }

    /**
     * @param GroupClient|null $groupClient
     * @return User
     */
    public function setGroupClient(GroupClient $groupClient = null): User
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
     * @return User
     */
    public function setMember(Member $member): User
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail():? string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return GroupClient
     */
    public function getAdminOf(): GroupClient
    {
        return $this->adminOf;
    }

    /**
     * @param GroupClient $adminOf
     * @return User
     */
    public function setAdminOf(GroupClient $adminOf): User
    {
        $this->adminOf = $adminOf;
        $adminOf->addAdminUser($this);

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainPassword():? string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     * @return User
     */
    public function setPlainPassword(string $plainPassword): User
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @return Broker
     */
    public function getBroker():? Broker
    {
        return $this->broker;
    }

    /**
     * @param Broker $broker
     *
     * @return User
     */
    public function setBroker(Broker $broker)
    {
        $this->broker = $broker;

        return $this;
    }
}
