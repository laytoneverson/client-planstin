<?php
/**
 * File: OAuthToken.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


class OAuthToken
{
    /**
     * @var string
     */
    private $grantType;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $expirationDate;

    /**
     * @var string
     */
    private $scope;

    /**
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }

    /**
     * @param string $grantType
     * @return OAuthToken
     */
    public function setGrantType(string $grantType): OAuthToken
    {
        $this->grantType = $grantType;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return OAuthToken
     */
    public function setToken(string $token): OAuthToken
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     * @return OAuthToken
     */
    public function setExpirationDate(string $expirationDate): OAuthToken
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * @param string $scope
     * @return OAuthToken
     */
    public function setScope(string $scope): OAuthToken
    {
        $this->scope = $scope;

        return $this;
    }


}
