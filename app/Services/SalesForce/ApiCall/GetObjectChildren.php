<?php
/**
 * File: GetObjectChildren.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiCall;


use App\Services\SalesForce\Dto\GetObjectChildrenDto;

class GetObjectChildren extends AbstractRestApiCall
{
    /**
     * @var GetObjectChildrenDto
     */
    protected $data;
    
    /**
     * @inheritDoc
     */
    protected function prepareRequest(): void
    {
        $this->authorizeWithToken();
        $this->requestMethod = self::HTTP_METHOD_GET;
    }

    /**
     * @inheritDoc
     */
    protected function getRequestUrl(): string
    {
        $parentObject = $this->data->getEntity();
        $relationship = $this->data->getRelationship();
        
        $url = $this->getObjectFullUrl($parentObject);


        $returnUrl = \sprintf('%s/%s__r', $url, $relationship->getSalesForceRelationshipName());

        return $returnUrl;
    }

    /**
     * @inheritDoc
     */
    protected function getDtoObjectType(): string
    {
        return GetObjectChildrenDto::class;
    }

}
