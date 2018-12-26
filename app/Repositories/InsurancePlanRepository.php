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

    public function getActiveInsurancePlans()
    {
        $query = $this->createQueryBuilder('p')
            ->where('p.active = 1')
            ->join('p.', )
    }
}
