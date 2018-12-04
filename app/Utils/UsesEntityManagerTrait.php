<?php
/**
 * File: EntityRepositoryTrait.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Utils;

use App\Entities\User;
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
}
