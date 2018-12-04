<?php
/**
 * File: UserRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param $emailAddress
     * @return bool
     */
    public function checkUserExists($emailAddress)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.email = :email')
            ->setParameter('email', $emailAddress);

        $users = $qb->getQuery()->getResult();

        return (bool) \count($users);
    }

    /**
     * @param $emailAddress
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getUserByEmail($emailAddress)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.email = :email')
            ->setParameter('email', $emailAddress);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
