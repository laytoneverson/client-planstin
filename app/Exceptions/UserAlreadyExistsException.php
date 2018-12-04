<?php
/**
 * File: UserAlreadyExistsException.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Exceptions;

use App\Entities\User;
use Exception;


class UserAlreadyExistsException extends Exception
{
    private $user;

    public function __construct(User $user = null)
    {
        $this->user = $user;

        parent::__construct('A user with this email address already exists');
    }

    public function getUser()
    {
        return $this->user;
    }
}
