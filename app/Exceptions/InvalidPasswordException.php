<?php
/**
 * File: InvalidPasswordException.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Exceptions;

use Exception;


class InvalidPasswordException extends Exception
{
    public function __construct()
    {
        parent::__construct('The password supplied for this user is invalid.');
    }
}
