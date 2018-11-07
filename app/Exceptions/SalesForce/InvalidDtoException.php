<?php
/**
 * File: InvalidDtoException.php
 * Planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 */

namespace App\Exceptions\SalesForce;

use Exception;

class InvalidDtoException extends Exception
{
    private const MESSAGE = 'The DTO (%s) submitted to this api call is incorrect. An object of type %s is needed.';

    public function __construct($desiredFQN = '', $passedFQN = '')
    {
        parent::__construct(\sprintf(self::MESSAGE, $passedFQN, $desiredFQN));
    }
}
