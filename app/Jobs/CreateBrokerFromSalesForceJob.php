<?php

namespace App\Jobs;

use App\Entities\Broker;
use App\Entities\User;
use App\Services\UserAccountService;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use stdClass;

class CreateBrokerFromSalesForceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $brokerRecord;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(stdClass $brokerRecord)
    {
        $this->brokerRecord = $brokerRecord;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityManagerInterface $entityManager, UserAccountService $userAccountService)
    {
        $broker = new Broker();
        $broker->setSfObjectId($this->brokerRecord->Id);

        if ($this->brokerRecord->Email__c) {
            $user = new User();
            $user
                ->setBroker($broker)
                ->setEmail($this->brokerRecord->Email__c)
                ->setPlainPassword($userAccountService->generatePassword());

            $userAccountService->createNewUserAccount($user);
            $entityManager->persist($user);
        }

        $entityManager->persist($broker);
        $entityManager->flush();
    }
}
