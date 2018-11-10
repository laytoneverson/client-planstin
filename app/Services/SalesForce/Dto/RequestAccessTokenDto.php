<?php
/**
 * File: RequestAccessTokenDto.phpDto.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\Dto;

use App\Entities\OAuthToken;

class RequestAccessTokenDto implements SalesForceDtoInterface
{
    protected $authorizationCode;

    protected $redirectUri;

    protected $grantType;

    public function __construct($authorizationCode, $redirectUri, $grantType = 'authorization_code')
    {
        $this->authorizationCode = $authorizationCode;
        $this->redirectUri = $redirectUri;
        $this->grantType = $grantType;
    }

    public function toSfObject(): array
    {
        /**
         *  POST /services/oauth2/token HTTP/1.1
         *   Host: login.salesforce.com
         *   grant_type=authorization_code
         *   &code=aPrxsmIEeqM9PiQroGEWx1UiMQd95_5JUZVEhsOFhS8EVvbfYBBJli2W5fn3zbo.8hojaNW_1g%3D%3D
         *   &client_id=3MVG9lKcPoNINVBIPJjdw1J9LLM82HnFVVX19KY1uA5mu0QqEWhqKpoW3svG3XHrXDiCQjK1mdgAvhCscA9GE
         *   &client_secret=1955279925675241571&
         *   redirect_uri=https%3A%2F%2Fwww.mysite.com%2Fcode_callback.jsp
         */

        return [
            'grant_type' => $this->grantType,
            'code' => $this->authorizationCode,
            'redirect_uri' => $this->redirectUri,
        ];
    }

    public function fromSfObject(string $data): SalesForceDtoInterface
    {
        // TODO: Implement fromSfObject() method.
    }

}
