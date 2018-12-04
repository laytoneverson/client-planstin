<?php
/**
 * File: PasswordService.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services;

use App\Utils\UsesEntityManagerTrait;
use Doctrine\ORM\EntityManagerInterface;
use \Illuminate\Contracts\Hashing\Hasher;
use App\Entities\User;

class PasswordService
{
    use UsesEntityManagerTrait;

    private $hasher;

    private $passwordStrengthValidator;

    /**
     * @param Hasher $hasher
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(Hasher $hasher, EntityManagerInterface $entityManager)
    {
        $this->hasher = $hasher;
        $this->entityManager = $entityManager;
    }

    /**
     * Validate and change the given users password
     *
     * @param User $user
     * @param string $password
     * @return void
     */
    public function changePassword(User $user, $password): void
    {
        $user->setPassword($this->hasher->make($password));
    }

    /**
     * @param $emailAddress
     * @return bool
     */
    public function checkUserExists($emailAddress): bool
    {
        return $this->getUserRepository()->checkUserExists($emailAddress);
    }
}
