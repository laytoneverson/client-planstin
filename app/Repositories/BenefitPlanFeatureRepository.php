<?php
/**
 * File: BenefitPlanFeatureRepositoryhp
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class BenefitPlanFeatureRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

}
