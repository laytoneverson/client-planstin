<?php

use App\Entities\CoverageTierBook;
use App\Entities\CoverageTierPrice;

/**
 * @var CoverageTierBook $priceBook
 * @var CoverageTierPrice $price
 */

?>

<h3 class="text-black plan-title">Rates</h3>

<div class="row">
    <div class="col-xs-12"><h4 class="text-black">{{ $priceBook->getCoverageTierLabel() }}</h4></div>
</div>

@foreach($priceBook->getCoverageTierPrices() as $price)


<div class="row">

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-black">{{ $price->getPriceTierLabel() }}</h5>
        </div>
    </div>

    <div class="col-xs-8 col-sm-9 col-md-9">
        <p class="emp-rate">Employee</p>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-3">
        <p class="emp-rate">{{ \sprintf('$%d.00', (float)$price->getEmployeePrice()) }}</p>
    </div>
    <div class="col-xs-8 col-sm-9 col-md-9">
        <p class="emp-rate">Employee & Spouse </p>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-3">
        <p class="emp-rate">{{ \sprintf('$%d.00', (float)$price->getEmployeeSpousePrice()) }}</p>
    </div>
    <div class="col-xs-8 col-sm-9 col-md-9">
        <p class="emp-rate">Employee & Child </p>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-3">
        <p class="emp-rate">{{ \sprintf('$%d.00', $price->getEmployeeChildrenPrice()) }}</p>
    </div>
    <div class="col-xs-8 col-sm-9 col-md-9">
        <p class="emp-rate">Employee & Family </p>
    </div>
    <div class="col-xs-4 col-sm-3 col-md-3">
        <p class="emp-rate">{{ \sprintf('$%d.00', $price->getEmployeeFamilyPrice()) }}</p>
    </div>
</div>
@endforeach
