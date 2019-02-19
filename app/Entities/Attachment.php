<?php
/**
 * File: Attachment.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Entities;


class Attachment extends AbstractSalesForceObjectEntity
{
    /**
     * @inheritDoc
     */
    public static function getSfObjectApiName(): string
    {
        return 'Attachment';
    }

    /**
     * @inheritDoc
     */
    public static function getSfObjectFriendlyName(): string
    {
        return 'Attachment';
    }

    /**
     * @inheritDoc
     */
    public static function getSfMapping(): array
    {
        return [
            'Id' => 'sfObjectId',
            'IsDeleted' => 'IsDeleted',
            'ParentId' => 'ParentId',
            'Name' => 'Name',
            'IsPrivate' => 'IsPrivate',
            'ContentType' => 'ContentType',
            'BodyLength' => 'BodyLength',
            'Body' => 'Body',
            'OwnerId' => 'OwnerId',
            'CreatedDate' => 'CreatedDate',
            'CreatedById' => 'CreatedById',
            'LastModifiedDate' => 'LastModifiedDate',
            'LastModifiedById' => 'LastModifiedById',
            'SystemModstamp' => 'SystemModstamp',
            'Description' => 'Description',
        ];
    }

}
