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
     * @var Client|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Client", inversedBy="users")
     */
    private $client;

    /**
     * @var Member|null
     *
     * @ORM\OneToOne(targetEntity="App\Entities\Member", inversedBy="user")
     */
    private $member;

    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Client", inversedBy="adminUsers")
     */
    private $adminOf;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $email;


    /**
     * @return int
     */
    public function getId():? int
    {
        return $this->id;
    }

    /**
     * @return Client
     */
    public function getClient():? Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return User
     */
    public function setClient(Client $client): User
    {
        $this->client = $client;

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
    public function getEmail(): string
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
}
