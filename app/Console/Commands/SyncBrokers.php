<?php

namespace App\Console\Commands;

use App\Entities\Broker;
use App\Jobs\CreateBrokerFromSalesForceJob;
use App\Services\SalesForce\ApiCall\SOQLQuery;
use App\Services\SalesForce\Dto\SOQLQuerySelectObjectRowsDto;
use App\Utils\UsesEntityManagerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

class SyncBrokers extends Command
{
    use UsesEntityManagerTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:sync:brokers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync brokers from Salesforce to the portal';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $records = $this->fetchAffiliates();

        foreach($records as $record) {
            $group = $this->getBrokerRepository()->findBySalesForceObjectId($record->Id);

            if (null === $group) {
                CreateBrokerFromSalesForceJob::dispatch($record);
            }
        }
    }

    private function fetchAffiliates()
    {
        $dto = new SOQLQuerySelectObjectRowsDto(Broker::class);

        /** @var SOQLQuery $SOQLQuery */
        $SOQLQuery = app(SOQLQuery::class);
        $SOQLQuery->setData($dto);
        $SOQLQuery->execute();

        return $dto->getReturnData()->records;
    }
}
