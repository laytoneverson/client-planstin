<?php
/**
 * File: EntityRepositoryTrait.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Utils;

use App\Entities\GroupClient;
use App\Entities\InsurancePlan;
use App\Entities\Member;
use App\Entities\User;
use App\Repositories\GroupClientRepository;
use App\Repositories\InsurancePlanRepository;
use App\Repositories\MemberRepository;
use App\Repositories\UserRepository;
use Doctrine\ORM\EntityManager;
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
            throw new \LogicException('This class must have access to the self::entityManager');
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
     * @return InsurancePlanRepository
     */
    protected function getInsurancePlanRepository()
    {
        return $this->getEntityManager()->getRepository(InsurancePlan::class);
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
}
