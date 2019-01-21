<?php

namespace App\Jobs;

use App\Entities\Member;
use App\Entities\MemberDependent;
use App\Repositories\MemberDependentRepository;
use App\Repositories\MemberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateDependentFromMemberObject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $sfMemberObject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        $this->sfMemberObject = $member;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityManagerInterface $entityManager)
    {
        /**
         * @var MemberRepository $memberRepository
         * @var MemberDependentRepository $dependentRepository
         */
        $memberRepository = $entityManager->getRepository(Member::class );

        $memberSfObjectId = ($this->sfMemberObject->Sponsor__c) ?? $this->sfMemberObject->Id;
        $member = $memberRepository->findBySalesForceObjectId($memberSfObjectId);

        if (!$member) {
            throw new \RuntimeException("No member record found for $memberSfObjectId");
        }

        $dependentRecord = new MemberDependent();
        $dependentRecord
            ->setDob($this->sfMemberObject->DOB__c)
            ->setFirstName($this->sfMemberObject->First_Name__c)
            ->setMiddleName($this->sfMemberObject->Middle_Initial__c)
            ->setLastName($this->sfMemberObject->Last_Name__c)
            ->setGender($this->sfMemberObject->Gender__c)
            ->setMember($member)
            ->setSocialSecurityNumber($this->sfMemberObject->SSN_TIN__c)
            ->setDependentRelation($this->sfMemberObject->Relationship__c);

        $persistenceService = MemberDependent::getSalesForcePersistenceService();
        $persistenceService->addObject($dependentRecord, ['Id', 'Name']);
        $entityManager->persist($dependentRecord);
        $entityManager->flush();

        $persistenceService->getSalesForceObjectData($member);
        $member->Migrated_To_Dependent__c = true;
        $persistenceService->updateObject($member, ['Id', 'Name']);
    }
}
