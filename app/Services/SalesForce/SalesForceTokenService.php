<?php
/**
 * File: SalesForceTokenService.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce;


class SalesForceTokenService
{
    /**
     * @var SalesForceApiParameters
     */
    protected $apiParams;


    public function __construct(SalesForceApiParameters $apiParams)
    {
        $this->apiParams = $apiParams;
    }

    public function getAuthUrl()
    {
        $format = '%s?response_type=code&client_id=%s&redirect_uri=%s&state=mystate';

        return \sprintf($format,
            $this->apiParams->getAuthEndpoint() . '/services/oauth2/authorize',
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

    public function requestAccessToken($code){
        /**
         *  POST /services/oauth2/token HTTP/1.1
         *   Host: login.salesforce.com
         *   grant_type=authorization_code
         *   &code=aPrxsmIEeqM9PiQroGEWx1UiMQd95_5JUZVEhsOFhS8EVvbfYBBJli2W5fn3zbo.8hojaNW_1g%3D%3D
         *   &client_id=3MVG9lKcPoNINVBIPJjdw1J9LLM82HnFVVX19KY1uA5mu0QqEWhqKpoW3svG3XHrXDiCQjK1mdgAvhCscA9GE
         *   &client_secret=1955279925675241571&
         *   redirect_uri=https%3A%2F%2Fwww.mysite.com%2Fcode_callback.jsp
         */

        $post = [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirect_uri,
        ];

        return $this->call('post', 'client', "{$this->auth_endpoint}/services/oauth2/token", $post);
    }
}
