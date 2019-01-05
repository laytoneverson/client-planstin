<?php
/**
 * File: BenefitPlanPersistenceServiceenceService.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\Persistence;


use App\Entities\BenefitPlan;
use App\Entities\BenefitPlanCopay;
use App\Entities\BenefitPlanFamily;
use App\Entities\BenefitPlanFeature;
use App\Entities\CoverageTierBook;
use App\Entities\PrescriptionCopay;

class BenefitPlanPersistenceService extends GenericPersistenceService
{
    public function syncInsurancePlans()
    {
        $this->syncAllObjectsOfType(BenefitPlanFamily::class);
        
        //Get all benefit plans and assign their plan family
        
        $sfBenefitPlans = $this->getAllObjectRecords(BenefitPlan::class);

        foreach($sfBenefitPlans as $record) {
            /** @var BenefitPlan $benefitPlan */
            $benefitPlan = $this->getBenefitPlanRepository()->findBySalesForceObjectId($record->Id);
            $planFamily = $this->getBenefitPlanFamilyRepository()
                ->findBySalesForceObjectId($record->Benefit_Plan_Family__c);

            if (null === $benefitPlan) {
                $benefitPlan = new BenefitPlan();
                $this->entityManager->persist($benefitPlan);
            }

            $this->populateFromSalesForceData($record, $benefitPlan, $benefitPlan::getSfMapping());
            $benefitPlan->setPlanFamily($planFamily);
        }

        $this->entityManager->flush();
        
        /** @var BenefitPlan $benefitPlans */
        $benefitPlans = $this->getBenefitPlanRepository()->findAll();
        foreach ($benefitPlans as $benefitPlan) {
            $this->syncChildrenOfObject($benefitPlan, [
                CoverageTierBook::class,
                BenefitPlanFeature::class,
                BenefitPlanCopay::class,
                PrescriptionCopay::class,
            ]);
        }

        $priceBooks = $this->getCoverageTierBookRepository()->findAll();
        foreach ($priceBooks as $priceBook) {
            $this->syncChildrenOfObject($priceBook);
        }
    }
}
