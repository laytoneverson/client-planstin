<?php

namespace App\Console\Commands;

use App\Services\SalesForce\Persistence\BenefitPlanPersistenceService;
use App\Utils\SalesForceDataExchangeTrait;
use App\Utils\UsesEntityManagerTrait;
use Illuminate\Console\Command;

class SalesForcePullPlans extends Command
{
    use UsesEntityManagerTrait, SalesForceDataExchangeTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:api:pull-benefit-plans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulls Planstin benefit plans from SalesForce';

    /**
     * @var BenefitPlanPersistenceService
     */
    private $benefitPlanPersistenceService;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        BenefitPlanPersistenceService $benefitPlanPersistenceService)
    {
        $this->benefitPlanPersistenceService =  $benefitPlanPersistenceService;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {

            $this->benefitPlanPersistenceService->syncInsurancePlans();

        } catch (\Throwable $exception) {
            report($exception);

            throw $exception;
        }
    }
}
