<?php

namespace App\Jobs;

use App\Entities\GroupClient;
use App\Entities\Member;
use App\Entities\User;
use App\Repositories\GroupClientRepository;
use App\Repositories\MemberRepository;
use App\Services\UserAccountService;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateMemberFromSalesforceObject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $memberRecord;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($memberRecord)
    {
        $this->memberRecord = $memberRecord;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityManagerInterface $entityManager, UserAccountService $userAccountService)
    {
        /**
         * @var GroupClientRepository $groupRepository
         * @var MemberRepository $memberRepository
         */
        $memberRepository = $entityManager->getRepository(Member::class);
        $groupRepository = $entityManager->getRepository(GroupClient::class);
        $userRepository = $entityManager->getRepository(User::class);

        $member = $memberRepository->findBySalesForceObjectId($this->memberRecord->Id);
        if ($member) {
            return;
        }

        $group = $groupRepository->findBySalesForceObjectId($this->memberRecord->Group__c);
        if (!$group) {
            throw new \RuntimeException('Group not found: '. $this->memberRecord->Group__c);
        }

        $emailAddress = !empty($this->memberRecord->Email)
            ? $this->memberRecord->Email
            : "{$this->memberRecord->Id}-noemail@planstin.com";

        $user = $userRepository->findOneBy(['email' => $emailAddress]);
        if (!$user) {

            $user = new User();
            $user
                ->setEmail($emailAddress)
                ->setPlainPassword($userAccountService->generatePassword());

            $userAccountService->createNewUserAccount($user);
            $entityManager->persist($user);
        }

        $member = new Member();
        $member
            ->setGroupClient($group)
            ->setSfObjectId($this->memberRecord->Id);

        $user->setMember($member);
        $entityManager->persist($member);
        $entityManager->flush();
    }
}
