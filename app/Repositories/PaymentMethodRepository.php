<?php
/**
 * File: PaymentMethodRepository.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Repositories;


use Doctrine\ORM\EntityRepository;

class PaymentMethodRepository extends EntityRepository
{
    use SalesForceObjectRepositoryTrait;
}
