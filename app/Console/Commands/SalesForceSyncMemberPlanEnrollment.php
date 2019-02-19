<?php

namespace App\Console\Commands;

use App\Entities\Member;
use App\Entities\MemberDependent;
use App\Jobs\CreateMemberPlanEnrollments;
use App\Repositories\MemberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

class SalesForceSyncMemberPlanEnrollment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:test:sync-member-plan-enrollment {sfid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync a specific members plan enrollment information';

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
        /** @var MemberRepository $memberRepository */
        $memberRepository = $this->entityManager->getRepository(Member::class);
        $memberPersistenceService = Member::getSalesForcePersistenceService();
        $objectId = $this->input->getArgument("sfid");

        /** @var $member Member */
        if (!$member = $memberRepository->findBySalesForceObjectId($objectId)) {
            throw new \RuntimeException("Member with sfid $objectId not found in database");
        };

        $memberPersistenceService->getSalesForceObjectData($member);

        $dependents = $member->getDependents();

        /** @var MemberDependent $dependent */
        foreach($dependents as $dependent) {

            try {
                MemberDependent::getSalesForcePersistenceService()->getSalesForceObjectData($dependent);

                $dependentMemberRecord = $memberPersistenceService->getObjectDataBySalesfoceId(
                    Member::class, $dependent->Migrated_From_Member__c
                );

                $dependentSponsorRecord = $memberPersistenceService->getObjectDataBySalesfoceId(
                    Member::class, $dependent->Member__c
                );

                $sfDependent = MemberDependent::getSalesForcePersistenceService()->getObjectDataBySalesfoceId(
                    MemberDependent::class,
                    $dependent->getSfObjectId()
                );

                if (!$dependentMemberRecord->Migrated_Enrolled_Plans__c) {
                    CreateMemberPlanEnrollments::dispatch($sfDependent, $dependentMemberRecord, $dependentSponsorRecord);
                }
            } catch (\Throwable $e) {
                report($e);
            }
        }
    }
}
