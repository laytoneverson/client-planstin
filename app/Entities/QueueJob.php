<?php
/**
 * File: QueueJob.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="jobs", indexes={ @ORM\Index(name="queue_idx", columns={"queue"}) })
 */
class QueueJob
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $queue;

    /**
     * @ORM\Column(type="text", nullable=false)
     *
     * @var string
     */
    private $payload = '';

    /**
     * @ORM\Column(type="smallint")
     *
     * @var int
     */
    private $attempts = 0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var int
     */
    private $reservedAt;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $availableAt;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $createdAt;

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
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param string $queue
     */
    public function setQueue(string $queue)
    {
        $this->queue = $queue;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     */
    public function setPayload(string $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return int
     */
    public function getAttempts()
    {
        return $this->attempts;
    }

    /**
     * @param int $attempts
     */
    public function setAttempts(int $attempts)
    {
        $this->attempts = $attempts;
    }

    /**
     * @return int
     */
    public function getReservedAt()
    {
        return $this->reservedAt;
    }

    /**
     * @param int $reservedAt
     */
    public function setReservedAt(int $reservedAt)
    {
        $this->reservedAt = $reservedAt;
    }

    /**
     * @return int
     */
    public function getAvailableAt()
    {
        return $this->availableAt;
    }

    /**
     * @param int $availableAt
     */
    public function setAvailableAt(int $availableAt)
    {
        $this->availableAt = $availableAt;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt(int $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
