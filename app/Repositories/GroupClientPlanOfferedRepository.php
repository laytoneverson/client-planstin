<?php
/**
 * File: GroupClientPlanOfferedRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class GroupClientPlanOfferedRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;
}
