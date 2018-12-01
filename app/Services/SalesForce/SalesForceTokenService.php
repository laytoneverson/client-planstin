<?php
/**
 * File: SalesForceTokenService.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce;

use App\Entities\OAuthToken;
use App\Services\SalesForce\ApiCall\RequestAccessToken;
use App\Services\SalesForce\Dto\RequestAccessTokenDto;
use App\Services\SalesForce\Dto\RequestRefreshTokenDto;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

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

    /**
     * @var EntityManager
     */
    protected $entityManager;

    public function __construct(
        SalesForceApiParameters $apiParams,
        RequestAccessToken $requestAccessToken,
        EntityManagerInterface $entityManager
    ) {
        $this->apiParams = $apiParams;
        $this->requestAccessTokenApiCall = $requestAccessToken;
        $this->entityManager = $entityManager;

        $this->loadAccessToken();
    }

    private function loadAccessToken(): void
    {
        /** @var ArrayCollection $tokens */
        $tokens = new ArrayCollection(
            $this->entityManager->getRepository(OAuthToken::class)->findAll()
        );

        if ($token = $tokens->last()) {
            $this->apiParams->setToken($token);
        }
    }

    /**
     * Returns a URL the user is sent to to gain an authorization code which will be used
     * to generate an access token.
     *
     * @return string
     */
    public function getAuthUrl(): string
    {
        $format = '%s?response_type=code&client_id=%s&redirect_uri=%s&state=mystate';

        return \sprintf($format,
            $this->apiParams->getAuthEndpoint() . self::AUTH_URI,
            $this->apiParams->getClientId(),
            $this->apiParams->getRedirectUri()
        );
    }

    /**
     * @param $authorizationCode
     * @return bool
     * @throws \Throwable
     */
    public function requestAccessToken($authorizationCode): bool
    {
        //@Todo: Add logic to check for an existing access token and refresh it if it exists.

        $dto = new RequestAccessTokenDto(
            $authorizationCode,
            $this->apiParams,
            'authorization_code'
        );

        try {

            $result = $this->requestAccessTokenApiCall
                ->setData($dto)
                ->execute();

        } catch (\Throwable $exception) {
            throw $exception;
        }

        $this->entityManager->persist($dto->getToken());
        $this->entityManager->flush();

        return true;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     *
     * @throws \Throwable
     */
    public function refreshAccessToken()
    {
        $dto = new RequestRefreshTokenDto(
            $this->apiParams
        );

        try {

            $result = $this->requestAccessTokenApiCall
                ->setData($dto)
                ->execute();

        } catch (\Throwable $exception) {
            throw $exception;
        }

        $this->entityManager->flush();
    }

    public function revokeAccessToken()
    {
        //@Todo: Revoke token if we need to in the future.
    }
}
