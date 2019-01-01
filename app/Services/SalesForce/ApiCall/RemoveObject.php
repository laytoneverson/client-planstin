<?php
/**
 * File: RemoveObject.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiCall;

use App\Entities\AbstractSalesForceObjectEntity;
use App\Services\SalesForce\Dto\RemoveObjectDto;

class RemoveObject extends AbstractRestApiCall
{
    /**
     * @var RemoveObjectDto
     */
    protected $data;

    protected function prepareRequest(): void
    {
        $this->authorizeWithToken();
        $this->requestBodyType = self::HTTP_METHOD_DELETE;
    }

    protected function getRequestUrl(): string
    {
        $object = $this->data->getObjectEntity();

        return $this->getObjectFullUrl($object);
    }

    protected function getDtoObjectType(): string
    {
        return RemoveObjectDto::class;
    }
}
