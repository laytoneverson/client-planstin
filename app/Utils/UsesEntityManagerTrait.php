<?php
/**
 * File: EntityRepositoryTrait.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Utils;

use App\Entities\BenefitPlanFamily;
use App\Entities\CoverageTierBook;
use App\Entities\GroupClient;
use App\Entities\BenefitPlan;
use App\Entities\Member;
use App\Entities\User;
use App\Repositories\BenefitPlanFamilyRepository;
use App\Repositories\CoverageTierBookRepository;
use App\Repositories\GroupClientRepository;
use App\Repositories\BenefitPlanRepository;
use App\Repositories\MemberRepository;
use App\Repositories\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;

trait UsesEntityManagerTrait
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @return EntityManager
     * @throws LogicException
     */
    protected function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->entityManager = app(EntityManagerInterface::class);
        }

        return $this->entityManager;
    }

    /**
     * @return UserRepository
     */
    protected function getUserRepository(): UserRepository
    {
        return $this->getEntityManager()->getRepository(User::class);
    }

    /**
     * @return BenefitPlanRepository
     */
    protected function getBenefitPlanRepository()
    {
        return $this->getEntityManager()->getRepository(BenefitPlan::class);
    }

    /**
     * @return GroupClientRepository
     */
    protected function getGroupClientRepository()
    {
        return $this->getEntityManager()->getRepository(GroupClient::class);
    }

    /**
     * @return MemberRepository
     */
    protected function getMemberRepository()
    {
        return $this->getEntityManager()->getRepository(Member::class);
    }

    /**
     * @return BenefitPlanFamilyRepository
     */
    protected function getBenefitPlanFamilyRepository()
    {
        return $this->getEntityManager()->getRepository(BenefitPlanFamily::class);
    }

    /**
     * @return CoverageTierBookRepository
     */
    protected function getCoverageTierBookRepository()
    {
        return $this->getEntityManager()->getRepository(CoverageTierBook::class);
    }
}
