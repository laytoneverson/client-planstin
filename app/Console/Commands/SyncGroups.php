<?php

namespace App\Console\Commands;

use App\Entities\GroupClient;
use App\Jobs\CreateGroupFromSalesForceObjectJob;
use App\Services\SalesForce\ApiCall\SOQLQuery;
use App\Services\SalesForce\Dto\SOQLQuerySelectObjectRowsDto;
use App\Utils\UsesEntityManagerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

class SyncGroups extends Command
{
    use UsesEntityManagerTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:sync:group-clients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync sales-force groups with the local instance.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $records = $this->fetchGroups();

        foreach($records as $record) {
            $group = $this->getGroupClientRepository()->findBySalesForceObjectId($record->Id);

            if (null === $group) {
                CreateGroupFromSalesForceObjectJob::dispatch($record);
            }
        }
    }

    private function fetchGroups()
    {
        $dto = new SOQLQuerySelectObjectRowsDto(GroupClient::class);
        /** @var SOQLQuery $SOQLQuery */
        $SOQLQuery = app(SOQLQuery::class);
        $SOQLQuery->setData($dto);
        try {
            $SOQLQuery->execute();
        } catch (\Throwable $exception) {
            throw $exception;
        }

        $data = $dto->getReturnData();

        return $data->records;
    }
}
