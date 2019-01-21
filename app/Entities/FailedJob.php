<?php
/**
 * File: FailedJob.phproject: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="failed_job")
 */
class FailedJob
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
    private $connection;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $queue;

    /**
     * @ORM\Column(type="text")
     */
    private $payload;

    /**
     * @ORM\Column(type="text")
     */
    private $exception;

    /**
     * @ORM\Column(type="datetime")
     */
    private $failedAt;

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
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param string $connection
     */
    public function setConnection(string $connection)
    {
        $this->connection = $connection;
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
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param mixed $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    /**
     * @return mixed
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param mixed $exception
     */
    public function setException($exception)
    {
        $this->exception = $exception;
    }

    /**
     * @return mixed
     */
    public function getFailedAt()
    {
        if (null === $this->failedAt) {
            $this->failedAt = Carbon::now();
        }

        return $this->failedAt;
    }

    /**
     * @param mixed $failedAt
     */
    public function setFailedAt($failedAt)
    {
        $this->failedAt = $failedAt;
    }
}
