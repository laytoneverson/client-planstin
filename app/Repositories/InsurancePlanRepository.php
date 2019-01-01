<?php
/**
 * File: InsurancePlanRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class InsurancePlanRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

    /**
     * @return mixed
     */
    public function getActiveInsurancePlans()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p, ctb, ctp, ipf, ipc, pc')
            ->where('p.active = 1')
            ->leftJoin('p.coverageTierBooks', 'ctb')
            ->leftJoin('ctb.coverageTierPrices', 'ctp')
            ->leftJoin('p.insurancePlanFeatures', 'ipf')
            ->leftJoin('p.insurancePlanCopays', 'ipc')
            ->leftJoin('p.prescriptionCopays', 'pc')
            ->getQuery();

        return $query->getResult();
    }
}
