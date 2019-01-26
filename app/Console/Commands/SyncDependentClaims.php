<?php

namespace App\Console\Commands;

use App\Entities\Claim;
use App\Jobs\SyncDependentClaim;
use Illuminate\Console\Command;

class SyncDependentClaims extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:sync:dependent-claims';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relate claim records to the new dependent records';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $claimsToSync = Claim::getSalesForcePersistenceService()->getAllObjectRecords(
            Claim::class,
            'Member_Dependent__c = null'
        );

        foreach ($claimsToSync as $claim) {
            SyncDependentClaim::dispatch($claim);
        }
    }
}
