<?php
/**
 * File: BenefitPlanCopayRepository.php* Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class BenefitPlanCopayRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

}
