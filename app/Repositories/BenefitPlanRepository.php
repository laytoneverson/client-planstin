<?php
/**
 * File: BenefitPlanRepositoryhp
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use App\Entities\BenefitPlan;
use Doctrine\ORM\EntityRepository;

class BenefitPlanRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

    /**
     * @return mixed
     */
    public function getActiveBenefitPlans()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p, ctb, ctp, ipf, ipc, pc')
            ->where('p.active = 1')
            ->leftJoin('p.coverageTierBooks', 'ctb')
            ->leftJoin('ctb.coverageTierPrices', 'ctp')
            ->leftJoin('p.benefitPlanFeatures', 'ipf')
            ->leftJoin('p.benefitPlanCopays', 'ipc')
            ->leftJoin('p.prescriptionCopays', 'pc')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param $planName
     * @return BenefitPlan
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByPlanName($planName)
    {
        return $this->createQueryBuilder('p')
            ->where('p.benefitPlanName = :planName')
            ->setParameter('planName', trim($planName))
            ->getQuery()
            ->getOneOrNullResult();
    }
}
