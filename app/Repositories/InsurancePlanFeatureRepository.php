<?php
/**
 * File: InsurancePlanFeatureRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class InsurancePlanFeatureRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

}
