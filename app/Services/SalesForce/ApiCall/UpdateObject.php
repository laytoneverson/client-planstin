<?php
/**
 * File: UpdateObject.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiCall;

use App\Entities\AbstractSalesForceObjectEntity;
use App\Services\SalesForce\Dto\UpdateObjectDto;

class UpdateObject extends AbstractRestApiCall
{
    /** @var UpdateObjectDto */
    protected $data;

    protected function prepareRequest(): void
    {
        $this->authorizeWithToken();
        $this->requestMethod = self::HTTP_METHOD_PATCH;
        $this->requestBodyType = self::REQUEST_BODY_JSON;

        $this->setRequestBodyParams($this->data->toSfObject());
    }

    protected function getRequestUrl(): string
    {
        $object = $this->data->getEntity();

        return $this->getObjectFullUrl($object);
    }

    protected function getDtoObjectType(): string
    {
        return UpdateObjectDto::class;
    }

}
