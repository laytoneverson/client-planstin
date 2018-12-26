<?php
/**
 * File: BrokerRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class BrokerRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

}
