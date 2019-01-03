<?php
/**
 * File: MemberDependentRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;


use Doctrine\ORM\EntityRepository;

class MemberDependentRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;
}
