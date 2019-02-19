<?php
/**
 * File: SalesForceApiCallErrorException.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Exceptions\SalesForce;

use App\Services\SalesForce\ApiCall\AbstractRestApiCall;
use App\Services\SalesForce\SalesForceApiError;

class SalesForceApiException extends \Exception
{
    protected $format = 'The api call %s returned an error: %s';

    protected $apiCall;

    protected $errorMessage;

    /**
     * @var SalesForceApiError
     */
    protected $apiError;

    public function __construct(
        AbstractRestApiCall $apiCall,
        SalesForceApiError $apiError,
        \Throwable $previous = null
    ) {

        $this->apiCall = $apiCall;
        $this->apiError = $apiError;

        $code = $this->apiError->getHttpResponseCode();

        parent::__construct(\sprintf($this->format, \get_class($apiCall), $apiError->getError()), $code, $previous);
    }

    /**
     * @return AbstractRestApiCall
     */
    public function getApiCall(): AbstractRestApiCall
    {
        return $this->apiCall;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->apiError->getError();
    }

    public function getErrorCode()
    {
        return $this->apiError->getError();
    }
}
