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
}
