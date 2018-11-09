<?php
/**
 * File: SalesForceApiParameters.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce;


class SalesForceApiParameters
{
    protected const REST_API_BASE_URI = 'services/data';

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $redirectUri;

    /**
     * @var string
     */
    protected $authEndpoint;

    /**
     * @var string
     */
    protected $apiEndpoint;

    /**
     * @var string
     */
    protected $env;

    /**
     * @var string
     */
    protected $instanceUrl;

    /**
     * @var string
     */
    protected $version = '';

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var bool
     */
    protected $debug = false;

    /**
     * Returns a url to build an endpoint from. i.e. https://salesforceinstance/services/data/vX.XX
     *
     * @return string
     */
    public function getRestApiBaseUrl(): string
    {
        $format = '/%s/%s/%s';

        return \sprintf(
            $format,
            $this->getApiEndpoint(),
            self::REST_API_BASE_URI,
            $this->getVersion()
            );
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     * @return SalesForceApiParameters
     */
    public function setClientId(string $clientId): SalesForceApiParameters
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     * @return SalesForceApiParameters
     */
    public function setClientSecret(string $clientSecret): SalesForceApiParameters
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }

    /**
     * @param string $redirectUri
     * @return SalesForceApiParameters
     */
    public function setRedirectUri(string $redirectUri): SalesForceApiParameters
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthEndpoint(): string
    {
        return $this->authEndpoint;
    }

    /**
     * @param string $authEndpoint
     * @return SalesForceApiParameters
     */
    public function setAuthEndpoint(string $authEndpoint): SalesForceApiParameters
    {
        $this->authEndpoint = $authEndpoint;

        return $this;
    }

    /**
     * @return string
     */
    public function getEnv(): string
    {
        return $this->env;
    }

    /**
     * @param string $env
     * @return SalesForceApiParameters
     */
    public function setEnv(string $env): SalesForceApiParameters
    {
        $this->env = $env;

        return $this;
    }

    /**
     * @return string
     */
    public function getInstanceUrl(): string
    {
        return $this->instanceUrl;
    }

    /**
     * @param string $instanceUrl
     * @return SalesForceApiParameters
     */
    public function setInstanceUrl(string $instanceUrl): SalesForceApiParameters
    {
        $this->instanceUrl = $instanceUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return SalesForceApiParameters
     */
    public function setVersion(string $version): SalesForceApiParameters
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return SalesForceApiParameters
     */
    public function setUserId(string $userId): SalesForceApiParameters
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return SalesForceApiParameters
     */
    public function setAccessToken(string $accessToken): SalesForceApiParameters
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     * @return SalesForceApiParameters
     */
    public function setDebug(bool $debug): SalesForceApiParameters
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @param mixed $apiEndpoint
     * @return SalesForceApiParameters
     */
    public function setApiEndpoint($apiEndpoint): self
    {
        $this->apiEndpoint = $apiEndpoint;

        return $this;
    }
}
