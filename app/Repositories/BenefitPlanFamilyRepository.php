<?php
/**
 * File: BenefitPlanFamilyRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class BenefitPlanFamilyRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

    public function findAllPlanFamilies()
    {
        $qb = $this->createQueryBuilder('pf')
            ->select('pf, p, ctb, ctp, ipf, ipc, pc')
            ->join('pf.benefitPlans', 'p')
            ->where('p.active = 1')
            ->andWhere('pf.active = 1')
            ->leftJoin('p.coverageTierBooks', 'ctb')
            ->leftJoin('ctb.coverageTierPrices', 'ctp')
            ->leftJoin('p.benefitPlanFeatures', 'ipf')
            ->leftJoin('p.benefitPlanCopays', 'ipc')
            ->leftJoin('p.prescriptionCopays', 'pc');

        return $qb->getQuery()->getResult();
    }
}
