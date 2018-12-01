<?php
/**
 * File: RequestAccessTokenDto.phpDto.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\OAuthToken;
use App\Http\Controllers\Oauth2;
use App\Services\SalesForce\SalesForceApiParameters;
use stdClass;

class RequestAccessTokenDto implements SalesForceDtoInterface
{
    /**
     * @var string
     */
    protected $authorizationCode;

    /**
     * @var string
     */
    protected $grantType;

    /**
     * @var SalesForceApiParameters
     */
    protected $salesForceApiParams;

    /**
     * @var stdClass|array
     */
    protected $returnData;

    /**
     * @var OAuthToken
     */
    protected $token;

    public function __construct(
        string $authorizationCode,
        SalesForceApiParameters $salesForceApiParams,
        string $grantType = 'authorization_code')
    {
        $this->authorizationCode = $authorizationCode;
        $this->salesForceApiParams = $salesForceApiParams;
        $this->grantType = $grantType;
    }

    public function toSfObject(): array
    {
        return [
            'grant_type' => $this->grantType,
            'code' => $this->authorizationCode,
            'redirect_uri' => $this->salesForceApiParams->getRedirectUri(),
            'client_secret' => $this->salesForceApiParams->getClientSecret(),
            'client_id' => $this->salesForceApiParams->getClientId(),
        ];
    }

    /**
     * @param string $data
     * @return SalesForceDtoInterface
     *
     * @throws \Throwable
     */
    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        try {

            $this->returnData = \GuzzleHttp\json_decode($data);
            $this->token = new OAuthToken((array)$this->returnData);

        } catch (\Throwable $exception) {
            throw $exception;
        }

        return $this;
    }

    /**
     * @return OAuthToken
     */
    public function getToken(): OAuthToken
    {
        return $this->token;
    }

}
