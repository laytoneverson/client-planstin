<?php
/**
 * File: SalesForceApiCallErrorException.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Exceptions\SalesForce;

use AbstractSalesForceApiCall;
use Exception;

class SalesForceApiCallErrorException extends Exception
{
    protected $format = 'The api call %s returned an error: %s';

    protected $apiCall;

    protected $errorMessage;

    public function __construct(
        AbstractSalesForceApiCall $apiCall,
        $errorMessage = '',
        $code = null,
        \Throwable $previous = null
    ) {

        $this->apiCall = $apiCall;
        $this->errorMessage = $errorMessage;

        parent::__construct(\sprintf($this->format, \get_class($apiCall), $errorMessage), $code, $previous);
    }

    /**
     * @return AbstractSalesForceApiCall
     */
    public function getApiCall(): AbstractSalesForceApiCall
    {
        return $this->apiCall;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}
