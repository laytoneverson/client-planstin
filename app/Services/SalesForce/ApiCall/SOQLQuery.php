<?php
/**
 * File: SOQLQuery.php
 * Project: planstin
 * Author: @laytoneverson <layton.everson@gmail.com>
 */

namespace App\Services\SalesForce\ApiCall;

use App\Services\SalesForce\Dto\SOQLQueryDto;

class SOQLQuery extends AbstractRestApiCall
{
    protected function prepareRequest(): void
    {
        $this->authorizeWithToken();
        $data = $this->data->toSfObject();
        $this->queryParams = \array_merge($this->queryParams, $data);
    }

    protected function getRequestUrl(): string
    {
        return $this->getRestApiBaseUrl() .'/query';
    }

    protected function getDtoObjectType(): string
    {
        return SOQLQueryDto::class;
    }
}
