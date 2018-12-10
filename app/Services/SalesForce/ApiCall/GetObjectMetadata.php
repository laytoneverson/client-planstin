<?php
namespace App\Services\SalesForce\ApiCall;

use App\Services\SalesForce\Dto\AddClientDto;
use App\Services\SalesForce\Dto\GetObjectMetadataDto;

/**
 * File: AddClientApiCall.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

class GetObjectMetadata extends AbstractRestApiCall
{
    protected function prepareRequest(): void
    {
        //Add Authorization Header
        $this->authorizeWithToken();

        //Set method to POST
        $this->requestMethod = self::HTTP_METHOD_GET;

        //Send request with JSON body
        $this->requestBodyType = self::REQUEST_BODY_FORM;
    }

    protected function getRequestUrl(): string
    {
        /** @var GetObjectMetadataDto $data */
        $data = $this->data;

        $objectData = $data->toSfObject();
        $objectName =  (\count($objectData))
            ? $objectData['objectName']
            : null;

        $endpoint = $this->apiParameters->getRestApiBaseUrl() . '/sobjects';

        if ($objectName) {
            $endpoint .= '/'. $objectName;

            if ($data->isDescribeObject()) {
                $endpoint .= '/describe';
            }
        }

        return $endpoint;
    }

    protected function getDtoObjectType(): string
    {
        return AddClientDto::class;
    }

}
