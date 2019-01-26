<?php

namespace App\Jobs;

use App\Entities\BenefitPlan;
use App\Entities\DependentPlanEnrollment;
use App\Entities\Member;
use App\Entities\MemberDependent;
use App\Entities\MemberPlanEnrollment;
use App\Repositories\BenefitPlanRepository;
use App\Repositories\MemberPlanEnrollmentRepository;
use App\Utils\SalesForceDataExchangeTrait;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use stdClass;

class CreateMemberPlanEnrollments implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SalesForceDataExchangeTrait;

    /** @var BenefitPlanRepository */
    private $planRepository;

    /** @var MemberPlanEnrollmentRepository */
    private $memberEnrollmentRepository;

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var stdClass */
    private $dependentRecord;

    /** @var stdClass */
    private $dependentMemberRecord;

    /** @var stdClass */
    private $dependentSponsorRecord;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dependentRecord, $dependentMemberRecord, $dependentSponsorRecord)
    {
        $this->dependentRecord = $dependentRecord;
        $this->dependentMemberRecord = $dependentMemberRecord;
        $this->dependentSponsorRecord = $dependentSponsorRecord;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        $memberEnrollmentRepository = $entityManager->getRepository(MemberPlanEnrollment::class);
        $memberDependentRepository = $entityManager->getRepository(DependentPlanEnrollment::class);

        $dependentId = $this->dependentRecord->Id;
        $dependent = $entityManager
            ->getRepository(MemberDependent::class)
            ->findBySalesForceObjectId($dependentId);

        $memberId = $this->dependentSponsorRecord->Id;
        $member = $entityManager
            ->getRepository(Member::class)
            ->findBySalesForceObjectId($memberId);


        if (!$member || !$dependent) {
            throw new EntityNotFoundException(
                "Member or Dependent record not found for $memberId or $dependentId not found!"
            );
        }

        $dependentRecordPlans = $this->buildMemberPlanData();
        foreach ($dependentRecordPlans as $k => $recordPlan) {

            if (null !== $recordPlan['plan']) {

                $planEnrollment = $memberEnrollmentRepository
                    ->findMemberPlanEnrollment($member, $recordPlan['plan']);

                if (!$planEnrollment) {
                    $planEnrollment = $this->addMemberPlanEnrollment(
                        $member,
                        $recordPlan['plan'],
                        $recordPlan['tier'],
                        $recordPlan['effective'],
                        $recordPlan['rate'],
                        $recordPlan['term'],
                        $recordPlan['external_policy_number']
                    );

                    $entityManager->persist($planEnrollment);
                }

                $dependentPlanEnrollment = $memberDependentRepository->findOneBy([
                    'memberDependent' => $dependent,
                    'memberPlanEnrollment' => $planEnrollment,
                ]);

                if (!$dependentPlanEnrollment) {

                    $dependentPlanEnrollment = new DependentPlanEnrollment();
                    $dependentPlanEnrollment->setMemberDependent($dependent)
                        ->setMemberPlanEnrollment($planEnrollment);

                    DependentPlanEnrollment::getSalesForcePersistenceService()
                        ->addObject($dependentPlanEnrollment);

                    $entityManager->persist($dependentPlanEnrollment);
                }

            }

            $entityManager->flush();

            $tempMember = New Member();
            $tempMember->setSfObjectId($this->dependentMemberRecord->Id);
            Member::getSalesForcePersistenceService()->getSalesForceObjectData($tempMember);
            $tempMember->Migrated_Enrolled_Plans__c = true;
            Member::getSalesForcePersistenceService()->updateObject($tempMember);

        }
    }

    private function addMemberPlanEnrollment(
        Member $member,
        BenefitPlan $plan,
        $tier = null,
        $effective = null,
        $rate = null,
        $term = null,
        $policyNumber = null
    ) {
        $memberPlanEnrollment = new MemberPlanEnrollment();
        $memberPlanEnrollment
            ->setMember($member)
            ->setBenefitPlan($plan)
            ->setCoverageTier($tier)
            ->setPlanEffectiveDate($effective)
            ->setPlanRate($rate)
            ->setPlaneTermEnd($term)
            ->setExternalPolicyNumber($policyNumber);

        MemberPlanEnrollment::getSalesForcePersistenceService()
            ->addObject($memberPlanEnrollment);

        $this->entityManager->persist($memberPlanEnrollment);

        return $memberPlanEnrollment;
    }

    private function buildMemberPlanData()
    {
        $memberSfRecord = $this->dependentMemberRecord;
        /** @var BenefitPlanRepository $planRepository */
        $planRepository = $this->entityManager->getRepository(BenefitPlan::class);

        return [
            'Accident' => [
                'plan' => $planRepository->findByPlanName($memberSfRecord->Accident_Plan__c),
                'tier' => null,
                'effective' => $memberSfRecord->Accident_Effective__c,
                'rate' => $memberSfRecord->Accident_Rate__c,
                'term' => $memberSfRecord->Accident_Term__c,
                'external_policy_number' => $memberSfRecord->Policy_Number__c,
            ],
            'Catastrophic' => [
                'plan' => $planRepository->findByPlanName($memberSfRecord->Catastrophic_Plan__c),
                'tier' => $memberSfRecord->Catastrophic_Tier__c,
                'effective' => $memberSfRecord->Catastrophic_Plan_Effective__c,
                'rate' => $memberSfRecord->Catastrophic_Rate__c,
                'term' => $memberSfRecord->Catastrophic_Plan_Term__c,
                'external_policy_number' => null,
            ],
            'Critical_Illness' =>  [
                'plan' => $planRepository->findByPlanName($memberSfRecord->Critical_Illness__c),
                'tier' => null,
                'effective' => $memberSfRecord->Critical_Illness_Effective__c,
                'rate' => $memberSfRecord->Critical_Illness_Rate__c,
                'term' => $memberSfRecord->Critical_Illness_Term__c,
                'external_policy_number' => $memberSfRecord->Policy_ID__c,
            ],
            'Dental' =>  [
                'plan' => $planRepository->findByPlanName($memberSfRecord->Dental_Plan__c),
                'tier' => $memberSfRecord->Dental_Tier__c,
                'effective' => $memberSfRecord->Dental_Effective__c,
                'rate' => $memberSfRecord->Dental_Rate__c,
                'term' => $memberSfRecord->Dental_Term__c,
                'external_policy_number' => null,
            ],
            'Health_Plan' =>  [
                'plan' => $planRepository->findByPlanName($memberSfRecord->Health_Plan__c),
                'tier' => $memberSfRecord->Health_Tier__c,
                'effective' => $memberSfRecord->Health_Plan_Effective__c,
                'rate' => $memberSfRecord->Health_Plan_Rate__c,
                'term' => $memberSfRecord->Health_Plan_Term__c,
                'external_policy_number' => null,
            ],
            'Vision_Plan' =>  [
                'plan' => $planRepository->findByPlanName($memberSfRecord->Vision_Plan__c),
                'effective' => $memberSfRecord->Vision_Effective__c,
                'tier' => $memberSfRecord->Vision_Tier__c,
                'rate' => $memberSfRecord->Vision_Rate__c,
                'term' => $memberSfRecord->Vision_Term__c,
                'external_policy_number' => null,
            ],
        ];
    }
}
