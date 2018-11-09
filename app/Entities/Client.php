<?php
/**
 * File: BusinessClient.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


class Client
{
    /**
     * @var Business
     */
    protected $business;

    protected $accountOwner;

    protected $accountName;

    protected $parentAccount;

    protected $groupNumber;

    /**
     * @var Member[]
     */
    protected $members;

    protected $affiliateAssigned;

    protected $groupBillingMethod;

    protected $groupNotes;

    protected $groupSitusState;

    protected $lagacyGroupNumber;

}
