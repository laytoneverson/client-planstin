<?php
/**
 * File: SalesForceTokenService.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce;

use App\Services\SalesForce\ApiCall\RequestAccessToken;
use App\Services\SalesForce\Dto\RequestAccessTokenDto;

class SalesForceTokenService
{
    public const AUTH_URI = '/services/oauth2/authorize';
    public const TOKEN_URI = '/services/oauth2/token';
    public const REVOKE_URI = '/services/oauth2/revoke';

    /**
     * @var SalesForceApiParameters
     */
    protected $apiParams;

    /**
     * @var RequestAccessToken
     */
    protected $requestAccessTokenApiCall;

    public function __construct(
        SalesForceApiParameters $apiParams,
        RequestAccessToken $requestAccessToken
    ) {
        $this->apiParams = $apiParams;
        $this->requestAccessTokenApiCall = $requestAccessToken;
    }

    /**
     * Returns a URL the user is sent to to gain an authorization code which will be used
     * to generate an access token.
     *
     * @return string
     */
    public function getAuthUrl()
    {
        $format = '%s?response_type=code&client_id=%s&redirect_uri=%s&state=mystate';

        return \sprintf($format,
            $this->apiParams->getAuthEndpoint() . self::AUTH_URI,
            $this->apiParams->getClientId(),
            $this->apiParams->getRedirectUri()
        );
    }

    public function refreshAccessToken($refresh){
        /**
         * POST /services/oath2/token HTTP/1.1
         * Host: login.salesforce.com
         * Authorization:  Basic client_id=3MVG9lKcPoNINVBIPJjdw1J9LLM82HnFVVX19KY1uA5mu0QqEWhqKpoW3svG3XHrXDiCQjK1mdgAvhCscA9GE&client_secret=1955279925675241571
         * grant_type=refresh_token&refresh_token=your token here
         */

        $post = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh,
        ];

        return $this->call('post', 'client', "$this->auth_endpoint/services/oauth2/token", $post);

    }

    public function requestAccessToken($authorizationCode){

        $dto = new RequestAccessTokenDto($authorizationCode,'');

        $result = $this->requestAccessTokenApiCall
            ->setData($dto)
            ->execute();
    }
}
