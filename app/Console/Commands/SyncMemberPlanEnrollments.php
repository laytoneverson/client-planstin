<?php

namespace App\Console\Commands;

use App\Entities\Member;
use App\Entities\MemberDependent;
use App\Jobs\CreateMemberPlanEnrollments;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

class SyncMemberPlanEnrollments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:sync:member-plan-enrollments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates plan enrollments from the member record';
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

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
        $persistenceService = MemberDependent::getSalesForcePersistenceService();
        $memberPersistenceService = Member::getSalesForcePersistenceService();

        $dependents = $persistenceService->getAllObjectRecords(MemberDependent::class);

        foreach ($dependents as $dependent) {

            $dependentMemberRecord = $memberPersistenceService->getObjectDataBySalesfoceId(
                Member::class, $dependent->Migrated_From_Member__c
            );

            $dependentSponsorRecord = $memberPersistenceService->getObjectDataBySalesfoceId(
                Member::class, $dependent->Member__c
            );

            if (!$dependentMemberRecord->Migrated_Enrolled_Plans__c) {
                CreateMemberPlanEnrollments::dispatch($dependent, $dependentMemberRecord, $dependentSponsorRecord);
            }

        }
    }
}
