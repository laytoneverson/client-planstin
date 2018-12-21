<?php
/**
 * File: PrescriptionCopayRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class PrescriptionCopayRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;

}
