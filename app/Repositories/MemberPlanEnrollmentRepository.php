<?php
/**
 * File: MemberPlanEnrollmentRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use App\Entities\BenefitPlan;
use App\Entities\Member;
use Doctrine\ORM\EntityRepository;

class MemberPlanEnrollmentRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

    public function findMemberPlanEnrollment(Member $member, BenefitPlan $plan)
    {
        return $this->createQueryBuilder('mpe')
            ->where('mpe.member = :member')->setParameter('member', $member)
            ->andWhere('mpe.benefitPlan = :plan')->setParameter('plan', $plan)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
