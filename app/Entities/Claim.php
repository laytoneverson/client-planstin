<?php
/**
 * File: Claim.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


class Claim extends AbstractSalesForceObjectEntity
{
    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Claims__c';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Claims';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'Claim_Status__c' => 'Claim_Status__c',
            'Date_of_Service__c' => 'Date_of_Service__c',
            'Date_Paid__c' => 'Date_Paid__c',
            'Group_ID__c' => 'Group_ID__c',
            'Legacy_Claim_Number__c' => 'Legacy_Claim_Number__c',
            'Member_Dependent__c' => 'Member_Dependent__c',
            'Member_ID__c' => 'Member_ID__c',
            'Note__c' => 'Note__c',
            'NPI_Number__c' => 'NPI_Number__c',
            'Provider_Name__c' => 'Provider_Name__c',
            'RecordTypeId' => 'RecordTypeId',
            'Sponsor__c' => 'Sponsor__c',
        ];
    }

}
