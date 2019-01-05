<?php
/**
 * File: GroupClientServicesOfferedFormHandler.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Form\Handler;

use App\Entities\GroupClient;
use App\Entities\GroupClientPlanOffered;
use App\Entities\BenefitPlan;
use App\Utils\UsesEntityManagerTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class GroupClientServicesOfferedFormHandler
{
    use UsesEntityManagerTrait;

    /**
     * @var GroupClient
     */
    private $groupClient;

    /**
     * @var BenefitPlan[]
     */
    private $availablePlans;

    /**
     * @var BenefitPlan[]
     */
    private $offeredPlans = [];

    public function __construct(EntityManagerInterface $entityManager, GroupClient $groupClient)
    {
        $this->entityManager = $entityManager;
        $this->groupClient = $groupClient;
        $this->availablePlans = $this->getBenefitPlanRepository()
            ->getActiveBenefitPlans();

        /**
         * @var GroupClientPlanOffered[] $plansOffered
         */
        $plansOffered = $groupClient->getPlansOffered();

        foreach ($plansOffered as $planOffered) {
            if ($planOffered->isCurrentlyOffered()) {
                $this->offeredPlans[] = $planOffered->getBenefitPlan();
            }
        }
    }

    public function getPlanOptions()
    {
        $planOptions = [];
        foreach($this->availablePlans as $plan) {
            $planId = $plan->getId();
            $planOptions[(string)$planId] = \in_array($planId, $this->offeredPlans, false)
                ? true
                : false;
        }

        return $planOptions;
    }

    public function updateSelectedPlans()
    {
        /** @var ArrayCollection|GroupClientPlanOffered[] $currentPlans */
        $currentPlans = $this->groupClient->getPlansOffered();

        // Remove plans that are no longer offered.
        foreach($currentPlans as $currentPlan) {

            if (!\in_array($currentPlan->getBenefitPlan()->getId(), $this->offeredPlans, false)) {
                $currentPlan->setCurrentlyOffered(false);
            }

        }

        //Updates or creates GroupClientPlanOfferedEntity
        foreach ($this->offeredPlans as $plan) {

            /** @var GroupClientPlanOffered $groupClientPlanOffered */
            $groupClientPlanOffered = $this->entityManager
                ->getRepository(GroupClientPlanOffered::class)
                ->findOneBy([
                    'benefitPlan' => $plan,
                    'groupClient' => $this->groupClient
                ]);

            if ($groupClientPlanOffered) {
                $groupClientPlanOffered->setForUpdate();
            } else {

                $groupClientPlanOffered = new GroupClientPlanOffered();
                $groupClientPlanOffered->setBenefitPlan($plan)
                    ->setGroupClient($this->groupClient);

                $this->entityManager->persist($groupClientPlanOffered);
            }

            $groupClientPlanOffered->setCurrentlyOffered(true);
        }
    }

    /**
     * @return array
     */
    public function getOfferedPlans(): array
    {
        return $this->offeredPlans;
    }

    public function isBenefitsClient()
    {
        return $this->groupClient->isBenefitsClient();
    }

    public function setIsBenefitsClient(bool $isBenefitsClient)
    {
        $this->groupClient->setIsBenefitsClient($isBenefitsClient);
    }

    public function isPayrollClient()
    {
        return $this->groupClient->isPayrollClient();
    }

    public function setIsPayrollClient(bool $payrollClient)
    {
        $this->groupClient->setIsPayrollClient($payrollClient);
    }

    /**
     * @param BenefitPlan $availablePlan
     */
    public function addAvailablePlan(BenefitPlan $availablePlan)
    {
        $this->availablePlans[] = $availablePlan;
    }

    /**
     * @param BenefitPlan $availablePlan
     */
    public function removeAvailablePlan(BenefitPlan $availablePlan)
    {
        if (false !== $key = array_search($availablePlan, $this->availablePlans, true)) {
            array_splice($this->availablePlans, $key, 1);
        }
    }

    /**
     * @param mixed $offeredPlan
     */
    public function addOfferedPlan($offeredPlan)
    {
        $this->offeredPlans[] = $offeredPlan;
    }

    /**
     * @param mixed $offeredPlan
     */
    public function removeOfferedPlan($offeredPlan)
    {
        if (false !== $key = array_search($offeredPlan, $this->offeredPlans, true)) {
            array_splice($this->offeredPlans, $key, 1);
        }
    }

    /**
     * @return BenefitPlan[]
     */
    public function getAvailablePlans():? array
    {
        return $this->availablePlans;
    }
}
