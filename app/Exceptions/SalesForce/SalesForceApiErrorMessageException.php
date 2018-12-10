<?php
/**
 * File: SalesForceApiErrorMessageException.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Exceptions\SalesForce;

use Exception;

class SalesForceApiErrorMessageException extends Exception
{
    public function __construct(array $errors)
    {
        $errorMessage = '';
        foreach ($errors as $error) {
            $errorMessage .= $error;
        }

        parent::__construct(\sprintf('Call returned an error message: %s', $errorMessage));
    }
}
