<?php
/**
 * File: PasswordService.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services;

use \Illuminate\Contracts\Hashing\Hasher;
use App\Entities\User;

class PasswordService
{

    private $hasher;

    private $passwordStrengthValidator;

    /**
     * @param Hasher $hasher
     */
    public function __construct(
        Hasher $hasher
    ) {
        $this->hasher = $hasher;
    }

    /**
     * Validate and change the given users password
     *
     * @param User $user
     * @param string $password
     * @return void
     */
    public function changePassword(User $user, $password)
    {
        $user->setPassword($this->hasher->make($password));
    }

}
