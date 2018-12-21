<?php
/**
 * File: UserRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class GroupClientRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

}
