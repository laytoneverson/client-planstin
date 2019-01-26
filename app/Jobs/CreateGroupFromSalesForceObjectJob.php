<?php

namespace App\Jobs;

use App\Entities\Contact;
use App\Entities\GroupClient;
use App\Entities\User;
use App\Exceptions\UserAlreadyExistsException;
use App\Services\SalesForce\ApiCall\SOQLQuery;
use App\Services\SalesForce\Dto\SOQLQueryDto;
use App\Services\SalesForce\Dto\SOQLQuerySelectObjectRowsDto;
use App\Services\UserAccountService;
use App\Utils\UsesEntityManagerTrait;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateGroupFromSalesForceObjectJob implements ShouldQueue
{
    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels,
        UsesEntityManagerTrait;

    /**
     * SF Object ID of the group.
     *
     * @var string
     */
    private $sfGroupObject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sfGroupObject)
    {
        $this->sfGroupObject = $sfGroupObject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        EntityManagerInterface $entityManager,
        UserAccountService $userAccountService
    ) {
        $this->entityManager = $entityManager;

        $contacts = $this->getContacts();
        $contact = new Contact();
        $group = new GroupClient();
        $group
            ->setSignupStep(GroupClient::ENROLL_STEP_PROFILE)
            ->setPrimaryContact($contact)
            ->setSfObjectId($this->sfGroupObject->Id);

        if(0 !== count($contacts)) {
            $primaryContact = $contacts[0];
            $contact->setSfObjectId($primaryContact->Id);
        } else {
            $emailAddress = \sprintf("%s-%s-noemail@planstin.com", 'group', $this->sfGroupObject->Id);
            $contact->setLastName('No Group')
                ->setFirstName('Contact')
                ->setEmail($emailAddress);

            $contactPersistenceService = Contact::getSalesForcePersistenceService();
            $contactPersistenceService->addObject($contact);
        }

        $broker = $this->getBrokerRepository()
            ->findBySalesForceObjectId($this->sfGroupObject->Affiliate_Assigned__c);
        if ($broker) {
            $group->setBroker($broker);
        }

        /** @var User $user */
        $user = $this->getUserRepository()->findOneBy([
            'email' => $primaryContact->Email
        ]);

        if($user) {

            if ($user->getGroupClient()) {
                return;
            }

            $user->setGroupClient($group);

        } else {

            $user = new User();
            $user
                ->setEmail($primaryContact->Email)
                ->setAdminOf($group)
                ->setPlainPassword($userAccountService->generatePassword());

            $userAccountService->createNewUserAccount($user);
            $entityManager->persist($user);

        }

        $entityManager->persist($contact);
        $entityManager->persist($group);

        $entityManager->flush();

    }

    private function getContacts()
    {
        /** @var SOQLQuery $SOQLQuery */
        $SOQLQuery = app(SOQLQuery::class);

        //Select contacts where Account.id = $this->sfObjectId
        $getContactsDto = new SOQLQuerySelectObjectRowsDto(
            Contact::class,
            SOQLQueryDto::RETURN_OBJECT,
            \sprintf("%s.Id = '%s'", GroupClient::getSfObjectApiName(), $this->sfGroupObject->Id)
        );

        $SOQLQuery->setData($getContactsDto);
        $SOQLQuery->execute();

        $returnData = $getContactsDto->getReturnData();

        return $returnData->records;
    }
}
