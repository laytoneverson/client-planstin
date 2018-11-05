<?php
/**
 * File: SfDtoInterface.php
 * planstin
 * Author: Layton Everson <layton.everson@gmail.com>
 * YourWeb Solutions
 */

namespace App\Services\SalesForce\Dto;

interface SalesForceDtoInterface
{
    /**
     * Creates an array representation of the object to be used with SalesForce
     *
     * @return array
     */
    public function toSfObject(): array;

    /**
     * Populates this object with data received from SalesForce
     *
     * @param string $data
     * @return SalesForceDtoInterface
     */
    public function fromSfObject(string $data): self;
}
