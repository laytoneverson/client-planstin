<?php
/**
 * File: AddObject.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiCall;


use App\Services\SalesForce\Dto\AddObjectDto;

class AddObject extends AbstractRestApiCall
{
    /** @var AddObjectDto */
    protected $data;

    protected function prepareRequest(): void
    {
        $this->authorizeWithToken();
        $this->requestMethod = self::HTTP_METHOD_POST;
        $this->setRequestBodyParams($this->data->toSfObject());
        $this->requestBodyType = self::REQUEST_BODY_JSON;
    }

    protected function getRequestUrl(): string
    {
        $object = $this->data->getEntity();

        return $this->getObjectBaseUrl($object::getSfObjectApiName());
    }

    protected function getDtoObjectType(): string
    {
        return AddObjectDto::class;
    }
}
