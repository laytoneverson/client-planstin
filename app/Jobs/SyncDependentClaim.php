<?php

namespace App\Jobs;

use App\Entities\Claim;
use App\Entities\MemberDependent;
use App\Utils\SalesForceDataExchangeTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncDependentClaim implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SalesForceDataExchangeTrait;

    private $claim;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($claim)
    {
        $this->claim = $claim;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $claim = new Claim();
        $this->populateFromSalesForceData($this->claim, $claim, Claim::getSfMapping());

        $where = \sprintf("Migrated_From_Member__r.Id = '%s'", $this->claim->Member_ID__c);
        $dependentReocrds = MemberDependent::getSalesForcePersistenceService()
           ->getAllObjectRecords(MemberDependent::class, $where);

        if (1 !== \count($dependentReocrds)) {
            throw new \RuntimeException(
                'Wrong amount of dependent records return from query. We need only 1 and got '
                . \count($dependentReocrds)
            );
        }

        $dependent = $dependentReocrds[0];
        $claim->Member_Dependent__c = $dependent->Id;

        Claim::getSalesForcePersistenceService()->updateObject($claim);
    }
}
