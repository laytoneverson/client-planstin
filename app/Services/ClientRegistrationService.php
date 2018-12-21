<?php
/**
 * File: ClientRegistrationService.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services;

use App\Entities\GroupClient;
use App\Entities\User;
use App\Services\SalesForce\ApiCall\AddClient;
use App\Services\SalesForce\ApiCall\AddContact;
use App\Services\SalesForce\Dto\AddClientDto;
use App\Services\SalesForce\Dto\AddContactDto;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ClientRegistrationService contains business logic to manage new business
 * client registrations.
 *
 * @package App\Services
 */
class ClientRegistrationService
{

    /**
     * @var UserAccountService
     */
    private $accountService;

    /**
     * @var AddClient
     */
    private $addClientApiCall;

    /**
     * @var string
     */
    private $errorMessage = '';

    /**
     * @var AddContact
     */
    private $addContactCall;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * ClientRegistrationService constructor.
     *
     * @param UserAccountService $accountService
     * @param AddClient $addClientApiCall
     * @param AddContact $addContactCall
     */
    public function __construct(
        UserAccountService $accountService,
        AddClient $addClientApiCall,
        AddContact $addContactCall,
        EntityManagerInterface $entityManager
    ) {
        $this->addClientApiCall = $addClientApiCall;
        $this->accountService = $accountService;
        $this->addContactCall = $addContactCall;
        $this->entityManager = $entityManager;
    }

    /**
     * Fetches or prepares a new Client entity.
     *
     * @return GroupClient
     */
    public function prepareNewClient(): GroupClient
    {
        /** @var User $currentUser*/
        $currentUser = $this->accountService->getCurrentUser();

        if (!$client = $currentUser->getGroupClient()) {
            $client = new GroupClient();
            $currentUser
                ->setAdminOf($client)
                ->setGroupClient($client);
        }

        return $client;
    }

    /**
     * Adds a new client to the SalesForce instance
     *
     * @param GroupClient $groupClient
     * @return bool
     * @throws \Throwable
     */
    public function insertSalesForceClient(GroupClient $groupClient): bool
    {
        if ($groupClient->getSfObjectId()) {

            try {
                $groupClient->setForUpdate();
                $groupClient->getPrimaryContact()->setForUpdate();

                $this->entityManager->flush();
            } catch (\Throwable $e) {
                report($e);
                $this->errorMessage = $e->getMessage();

                return false;
            }

            return true;
        }

        //Add GroupClient record to Sales Force
        try {

            $newClientDto = new AddClientDto($groupClient);
            $this->addClientApiCall->setData($newClientDto);
            $this->addClientApiCall->execute();

        } catch (\Throwable $exception) {
            report($exception);
            $this->errorMessage = $exception->getMessage();

            return false;
        }

        //Add Contact record to Sales Force
        try {

            $newContactDto = new AddContactDto($groupClient->getPrimaryContact());
            $this->addContactCall->setData($newContactDto);
            $this->addContactCall->execute();

        } catch (\Throwable $exception) {
            report($exception);
            $this->errorMessage = $exception->getMessage();

            return false;
        }

        $this->entityManager->persist($groupClient);
        $this->entityManager->flush();

        return true;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->errorMessage;
    }
}
