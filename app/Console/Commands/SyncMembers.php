<?php

namespace App\Console\Commands;

use App\Entities\Member;
use App\Jobs\CreateDependentFromMemberObject;
use App\Jobs\CreateMemberFromSalesforceObject;
use App\Services\SalesForce\Persistence\GenericPersistenceService;
use App\Utils\UsesEntityManagerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

class SyncMembers extends Command
{
    use UsesEntityManagerTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:sync:members';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync members from salesforce to portal';

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
        /** @var GenericPersistenceService $persistenceService */
        $persistenceService = Member::getSalesForcePersistenceService();
        $rows = $persistenceService->getAllObjectRecords(Member::class);

        foreach($rows as $row) {

            $member = $this->getMemberRepository()->findBySalesForceObjectId($row->Id);

            if (!$member && empty($row->Sponsor__c)) {
                CreateMemberFromSalesforceObject::dispatch($row)->onQueue('high');
            }

            if (true !== $row->Migrated_To_Dependent__c) {
                CreateDependentFromMemberObject::dispatch($row)->onQueue('medium');
            }
        }
    }
}
