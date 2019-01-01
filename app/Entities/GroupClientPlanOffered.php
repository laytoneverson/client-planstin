<?php
/**
 * File: GroupClientPlanOffered.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="group_client_plan_offered")
 */
class GroupClientPlanOffered extends AbstractSalesForceObjectEntity
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
     * @var InsurancePlan
     *
     * @ORM\ManyToOne(targetEntity="InsurancePlan", inversedBy="OfferedByGroupClients")
     */
    private $insurancePlan;

    /**
     * @var GroupClient
     *
     * @ORM\ManyToOne(targetEntity="GroupClient", inversedBy="plansOffered")
     */
    private $groupClient;

    /**
     * @var bool
     */
    private $currentlyOffered = true;

    public static function getSfObjectApiName(): string
    {
        return 'Client_Plan_Offered__c';
    }

    public static function getSfObjectFriendlyName(): string
    {
        return 'Client Plan Offered Join Table';
    }

    public function autoAddToSalesForce(): bool
    {
        return true;
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Currently_Offered__c' => 'currentlyOffered',
            'Group_Client__c' => 'groupClient.sfObjectId',
            'Insurance_Plan__c' => 'insurancePlan.sfObjectId'
        ];
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return GroupClientPlanOffered
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return InsurancePlan
     */
    public function getInsurancePlan(): ?InsurancePlan
    {
        return $this->insurancePlan;
    }

    /**
     * @param InsurancePlan $insurancePlan
     * @return GroupClientPlanOffered
     */
    public function setInsurancePlan(InsurancePlan $insurancePlan)
    {
        $this->insurancePlan = $insurancePlan;

        return $this;
    }

    /**
     * @return GroupClient
     */
    public function getGroupClient(): ?GroupClient
    {
        return $this->groupClient;
    }

    /**
     * @param GroupClient $groupClient
     * @return GroupClientPlanOffered
     */
    public function setGroupClient(GroupClient $groupClient)
    {
        $this->groupClient = $groupClient;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCurrentlyOffered(): bool
    {
        return $this->currentlyOffered;
    }

    /**
     * @param bool $currentlyOffered
     * @return GroupClientPlanOffered
     */
    public function setCurrentlyOffered(bool $currentlyOffered)
    {
        $this->currentlyOffered = $currentlyOffered;

        return $this;
    }
}
