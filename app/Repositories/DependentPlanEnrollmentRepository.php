<?php
/**
 * File: DependentPlanEnrollmentRepository.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

class DependentPlanEnrollmentRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

    public function findEnrollmentRecordBySfIds($dependentSfId, $memberEnrollmentSfId)
    {
        $qb = $this->createQueryBuilder('dpe')
            ->join(
                'dpe.memberDependent',
                'md',
                Expr\Join::WITH,
                'md.sfObjectId = :dependentSfObjectId'
            )
            ->setParameter('dependentSfObjectId', $dependentSfId)

            ->join(
                'dpe.memberPlanEnrollment',
                'mpe',
                Expr\Join::WITH,
                'mpe.sfObjectId = :memberEnrollmentSfObjectId'
            )
            ->setParameter('memberEnrollmentSfObjectId', $memberEnrollmentSfId)

            ->getQuery();

        return $qb->getOneOrNullResult();
    }
}
