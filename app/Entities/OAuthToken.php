<?php
/**
 * File: OAuthToken.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;

use DateTime;
use Doctrine\ORM\Mapping AS ORM;


/**
 * Class OAuthToken
 *
 * @package App\Entities
 * @ORM\Entity(repositoryClass="App\Repositories\OAuthTokenRepository")
 * @ORM\Table(name="token")
 */
class OAuthToken
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $tokenType;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $refreshToken;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $accessToken;

    /**
     * @var string
     * @ORM\Column(type="datetime")
     */
    private $issueDate;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $idUrl;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $instanceUrl;

    public function __construct(array $tokenData)
    {
        $this->accessToken = $tokenData['access_token'];
        $this->refreshToken = $tokenData['refresh_token'];
        $this->tokenType = $tokenData['token_type'];
        $this->instanceUrl = $tokenData['instance_url'];
        $this->idUrl = $tokenData['id'];
        $this->issueDate = new \DateTime();
    }

    public function refresh(array $tokenData)
    {
        $this->accessToken = $tokenData['access_token'];
        $this->instanceUrl = $tokenData['instance_url'];
        $this->issueDate = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getIssueDate(): string
    {
        return $this->issueDate;
    }

    /**
     * @return string
     */
    public function getIdUrl(): string
    {
        return $this->idUrl;
    }

    /**
     * @return string
     */
    public function getInstanceUrl(): string
    {
        return $this->instanceUrl;
    }
}
