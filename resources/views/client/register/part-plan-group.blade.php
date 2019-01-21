<?php

use App\Entities\BenefitPlanFamily;

/**
 * @var BenefitPlanFamily $planFamily
 */

?>
<!-- ======= Plan Family Start ======= -->

<li class="q">
    <span>{{ $planFamily->getDisplayName() }}</span>
    <img class="arrow-rotate" src="{{asset('images/arrow.png')}}">
</li>

<li class="a" style="display: list-item;">
    <ul class="plans">
        @foreach($planFamily->getBenefitPlans() as $plan)
            @include('client.register.part-plan')
        @endforeach

    </ul>
</li>

<!-- ======= Plan Family End ======= -->
