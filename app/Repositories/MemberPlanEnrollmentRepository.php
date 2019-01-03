<?php
/**
 * File: MemberPlanEnrollmentRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class MemberPlanEnrollmentRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;
}
