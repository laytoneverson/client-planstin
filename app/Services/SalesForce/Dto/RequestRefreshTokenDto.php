<?php
/**
 * File: RequestAccessTokenDto.phpDto.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\OAuthToken;
use App\Services\SalesForce\SalesForceApiParameters;
use stdClass;

class RequestRefreshTokenDto implements SalesForceDtoInterface
{
    /**
     * @var string
     */
    protected $grantType = 'refresh_token';

    /**
     * @var SalesForceApiParameters
     */
    protected $apiParams;

    /**
     * @var stdClass|array
     */
    protected $returnData;

    public function __construct(SalesForceApiParameters $apiParams)
    {
        $this->apiParams = $apiParams;
    }

    public function toSfObject(): array
    {
        return [
            'grant_type' => $this->grantType,
            'refresh_token' => $this->apiParams->getToken()->getRefreshToken(),
            'client_id' => $this->apiParams->getClientId(),
            'client_secret' => $this->apiParams->getClientSecret(),
        ];
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        $this->returnData = \GuzzleHttp\json_decode($data);

        /**
         * @var OAuthToken
         */
        $this->apiParams->getToken()->refresh( (array)$this->returnData);

        return $this;
    }

    /**
     * @return OAuthToken
     */
    public function getToken()
    {
        return $this->apiParams->getToken();
    }

}
