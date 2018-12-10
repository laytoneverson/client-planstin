<?php
/**
 * File: UserAccountService.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services;


use App\Entities\User;
use App\Exceptions\InvalidPasswordException;
use App\Exceptions\UserAlreadyExistsException;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UserAccountService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var PasswordService
     */
    private $passwordService;

    public function __construct(EntityManagerInterface $entityManager, PasswordService $passwordService)
    {
        $this->entityManager = $entityManager;
        $this->passwordService = $passwordService;
    }

    /**
     * @param User $user
     * @return bool
     * @throws InvalidPasswordException
     */
    public function authenticateUser(User $user): bool
    {
        if (!$success = Auth::guard()->attempt(
            [
                'email' => $user->getEmail(),
                'password' => $user->getPlainPassword()
            ])
        ) {
            throw new InvalidPasswordException();
        }

        return $success;
    }

    /**
     * @param User $user
     * @throws UserAlreadyExistsException
     */
    public function createNewUserAccount(User $user): void
    {
        if ($this->passwordService->checkUserExists($user->getEmail())) {
            throw new UserAlreadyExistsException();
        }

        //todo: Validate password...

        $user->setPassword(Hash::make($user->getPlainPassword()));

        // Trigger new user event
        event(new Registered($user));

        // Login new user
        Auth::guard()->login($user);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function getCurrentUser(): User
    {
        $user = Auth::user();

        if (! $user instanceof User) {
            throw new \LogicException('No user is not authenticated');
        }

        return $user;
    }
}
