<?php

namespace App\Console\Commands;

use App\Entities\CoverageTierBook;
use App\Entities\CoverageTierPrice;
use App\Entities\InsurancePlan;
use App\Entities\InsurancePlanCopay;
use App\Entities\InsurancePlanFeature;
use App\Entities\PrescriptionCopay;
use App\Services\SalesForce\ApiCall\SOQLQuery;
use App\Services\SalesForce\Dto\SOQLQueryDto;
use App\Services\SalesForce\Dto\SOQLQuerySelectObjectRowsDto;
use App\Utils\SalesForceDataExchangeTrait;
use App\Utils\UsesEntityManagerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

class SalesForcePullPlans extends Command
{
    use UsesEntityManagerTrait, SalesForceDataExchangeTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:api:pull-insurance-plans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulls insurance plans from Sales Force';

    /**
     * @var SOQLQuery
     */
    private $SOQLQuery;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SOQLQuery $SOQLQuery, EntityManagerInterface $entityManager)
    {
        $this->SOQLQuery = $SOQLQuery;
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

        try {
            $this->pullInsurancePlans();
        } catch (\Throwable $exception) {
            report($exception);
            throw $exception;
        }

        $activePlans = $this->getInsurancePlanRepository()
            ->findBy(['active' => true]);

        $insurancePlanChildren = [
            CoverageTierBook::class,
            InsurancePlanFeature::class,
            InsurancePlanCopay::class,
            PrescriptionCopay::class,
        ];

        /**
         * @var InsurancePlan $activePlan
         */
        foreach($activePlans as $activePlan) {
            foreach ($insurancePlanChildren as $childClassFqn) {

                try {
                    $this->pullChildrenOfPlan($activePlan, $childClassFqn);
                } catch (\Throwable $exception) {
                    report($exception);
                    throw $exception;
                }

            }
        }

        $coverageTierBooks = $this->getEntityManager()
            ->getRepository(CoverageTierBook::class)
            ->findAll();

        foreach($coverageTierBooks as $priceBook) {
            $this->pullPriceBookPrices($priceBook);
        }

    }

    /**
     * @param InsurancePlan $insurancePlan
     * @param string $childFqn
     * @throws \App\Exceptions\SalesForce\SalesForceApiException
     */
    private function pullChildrenOfPlan(InsurancePlan $insurancePlan, string $childFqn)
    {
        $repo = $this->entityManager->getRepository($childFqn);

        $where = \sprintf('Insurance_Plan__r.id = \'%s\'', $insurancePlan->getSfObjectId());
        $dto = new SOQLQuerySelectObjectRowsDto($childFqn, SOQLQueryDto::RETURN_OBJECT, $where);
        $this->SOQLQuery->setData($dto);
        $this->SOQLQuery->execute();

        $return = $dto->getReturnData();

        foreach($return->records as $record) {

            $storedRecord = $repo->findBySalesForceObjectId($record->Id);

            if (null === $storedRecord) {
                $storedRecord = new $childFqn();
                $this->entityManager->persist($storedRecord);
            }
            $storedRecord->setInsurancePlan($insurancePlan);
            $this->populateFromSalesForceData($record, $storedRecord, $childFqn::getSfMapping());

        }

        $this->entityManager->flush();
    }

    /**
     * @param InsurancePlan $insurancePlan
     * @param string $childFqn
     * @throws \App\Exceptions\SalesForce\SalesForceApiException
     */
    private function pullPriceBookPrices(CoverageTierBook $priceBook)
    {
        $childFqn = CoverageTierPrice::class;
        $repo = $this->entityManager->getRepository($childFqn);

        $where = \sprintf('Coverage_Tier_Book__r.id = \'%s\'', $priceBook->getSfObjectId());
        $dto = new SOQLQuerySelectObjectRowsDto($childFqn, SOQLQueryDto::RETURN_OBJECT, $where);
        $this->SOQLQuery->setData($dto);
        $this->SOQLQuery->execute();

        $return = $dto->getReturnData();

        foreach($return->records as $record) {

            $storedRecord = $repo->findBySalesForceObjectId($record->Id);

            if (null === $storedRecord) {
                $storedRecord = new $childFqn();
                $this->entityManager->persist($storedRecord);
            }

            $storedRecord->setCoverageTierBook($priceBook);
            $this->populateFromSalesForceData($record, $storedRecord, $childFqn::getSfMapping());
        }

        $this->entityManager->flush();
    }



    /**
     * @throws \App\Exceptions\SalesForce\SalesForceApiException
     */
    private function pullInsurancePlans()
    {
        $insuranceDto = new SOQLQuerySelectObjectRowsDto(InsurancePlan::class);
        $this->SOQLQuery->setData($insuranceDto);
        $this->SOQLQuery->execute();

        $insurancePlans = $insuranceDto->getReturnData();

        $this->updateInsurancePlans($insurancePlans->records);
    }

    private function updateInsurancePlans(array $plans)
    {
        $insurancePlanRepo = $this->getInsurancePlanRepository();

        foreach ($plans as $plan) {

            $storedPlan = $insurancePlanRepo->findBySalesForceObjectId($plan->Id);

            if (null === $storedPlan) {
                $storedPlan = new InsurancePlan();
                $this->entityManager->persist($storedPlan);
            }

            $this->populateFromSalesForceData($plan, $storedPlan, InsurancePlan::getSfMapping());
        }

        $this->entityManager->flush();
    }
}
