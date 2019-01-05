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
}
