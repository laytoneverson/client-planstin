<?php
/**
 * File: GroupClientPlanOffered.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repositories\GroupClientPlanOfferedRepository")
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
     * @var BenefitPlan
     *
     * @ORM\ManyToOne(targetEntity="BenefitPlan", inversedBy="OfferedByGroupClients")
     */
    private $benefitPlan;

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

    public static function autoAddToSalesForce(): bool
    {
        return true;
    }

    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Currently_Offered__c' => 'currentlyOffered',
            'Group_Client__c' => 'groupClient.sfObjectId',
            'Benefit_Plan__c' => 'benefitPlan.sfObjectId'
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
     * @return BenefitPlan
     */
    public function getBenefitPlan(): ?BenefitPlan
    {
        return $this->benefitPlan;
    }

    /**
     * @param BenefitPlan $benefitPlan
     * @return GroupClientPlanOffered
     */
    public function setBenefitPlan(BenefitPlan $benefitPlan)
    {
        $this->benefitPlan = $benefitPlan;

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
