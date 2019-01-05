<?php

namespace App\Console\Commands;

use App\Entities\CoverageTierBook;
use App\Entities\CoverageTierPrice;
use App\Entities\BenefitPlan;
use App\Entities\BenefitPlanCopay;
use App\Entities\BenefitPlanFeature;
use App\Entities\PrescriptionCopay;
use App\Services\SalesForce\ApiCall\SOQLQuery;
use App\Services\SalesForce\Dto\SOQLQueryDto;
use App\Services\SalesForce\Dto\SOQLQuerySelectObjectRowsDto;
use App\Services\SalesForce\Persistence\BenefitPlanPersistenceService;
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
    protected $signature = 'sales-force:api:pull-benefit-plans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulls Planstin benefit plans from SalesForce';

    /**
     * @var SOQLQuery
     */
    private $SOQLQuery;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
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
        SOQLQuery $SOQLQuery,
        EntityManagerInterface $entityManager,
        BenefitPlanPersistenceService $benefitPlanPersistenceService)
    {
        $this->SOQLQuery = $SOQLQuery;
        $this->entityManager = $entityManager;

        parent::__construct();
        $this->benefitPlanPersistenceService = $benefitPlanPersistenceService;
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

//        $activePlans = $this->getBenefitPlanRepository()
//            ->findBy(['active' => true]);
//
//        $benefitPlanChildren = [
//            CoverageTierBook::class,
//            BenefitPlanFeature::class,
//            BenefitPlanCopay::class,
//            PrescriptionCopay::class,
//        ];
//
//        /**
//         * @var BenefitPlan $activePlan
//         */
//        foreach($activePlans as $activePlan) {
//            foreach ($benefitPlanChildren as $childClassFqn) {
//
//                try {
//                    $this->pullChildrenOfPlan($activePlan, $childClassFqn);
//                } catch (\Throwable $exception) {
//                    report($exception);
//                    throw $exception;
//                }
//
//            }
//        }
//
//        $coverageTierBooks = $this->getEntityManager()
//            ->getRepository(CoverageTierBook::class)
//            ->findAll();
//
//        foreach($coverageTierBooks as $priceBook) {
//            $this->pullPriceBookPrices($priceBook);
//        }

    }

    /**
     * @param BenefitPlan $benefitPlan
     * @param string $childFqn
     * @throws \App\Exceptions\SalesForce\SalesForceApiException
     */
    private function pullChildrenOfPlan(BenefitPlan $benefitPlan, string $childFqn)
    {
        $repo = $this->entityManager->getRepository($childFqn);

        $where = \sprintf('Benefit_Plan__r.id = \'%s\'', $benefitPlan->getSfObjectId());
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
            $storedRecord->setBenefitPlan($benefitPlan);
            $this->populateFromSalesForceData($record, $storedRecord, $childFqn::getSfMapping());

        }

        $this->entityManager->flush();
    }

    /**
     * @param BenefitPlan $benefitPlan
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

            $this->populateFromSalesForceData($record, $storedRecord, $childFqn::getSfMapping());
        }

        $this->entityManager->flush();
    }


    /**
     * @throws \App\Exceptions\SalesForce\SalesForceApiException
     */
    private function pullBenefitPlans()
    {
        $benefitPlanDto = new SOQLQuerySelectObjectRowsDto(BenefitPlan::class);
        $this->SOQLQuery->setData($benefitPlanDto);
        $this->SOQLQuery->execute();

        $benefitPlans = $benefitPlanDto->getReturnData();

        $this->updateBenefitPlans($benefitPlans->records);
    }

    private function updateBenefitPlans(array $plans)
    {
        $benefitPlanRepo = $this->getBenefitPlanRepository();

        foreach ($plans as $plan) {

            $storedPlan = $benefitPlanRepo->findBySalesForceObjectId($plan->Id);

            if (null === $storedPlan) {
                $storedPlan = new BenefitPlan();
                $this->entityManager->persist($storedPlan);
            }

            $this->populateFromSalesForceData($plan, $storedPlan, BenefitPlan::getSfMapping());
        }

        $this->entityManager->flush();
    }
}
