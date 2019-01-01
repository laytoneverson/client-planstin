<?php

use App\Entities\InsurancePlan;
/** @var InsurancePlan $plan */

?>
<li>
    <div class="row">
        <div class="col-md-6">
            <div class="row">

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <h3 class="text-black plan-title">
                        {{ $plan->getInsurancePlanDisplayName() }}
                    </h3>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <h3 class="text-black plan-title"> Plan Outline </h3>

                    @if($plan->getPlanDetailsLink())
                        <!-- ====== Plan Download Link ====== -->
                        <a href="{{ $plan->getPlanDetailsLink()  }}" class="outline-down text-gray-3">
                            <i class="fa fa-download" aria-hidden="true"></i><span>download outline</span>
                        </a>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-8">


                    <!-- ====== Rates Column Start ====== -->

                    @foreach($plan->getCoverageTierBooks() as $priceBook)
                        @include('client.register.part-plan-tierbook')
                    @endforeach

                    <!-- ====== Rates Column End ====== -->

                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                            <h3 class="text-black plan-title">Add</h3>
                        </div>
                        <div class="col-xs-6 col-md-6">

                            <!-- ====== Service Checkbox ======= -->
                            <p class="plan-check">

                                @foreach($form['offeredPlans'] as $offeredPlanType)
                                    @if($offeredPlanType->vars['value'] === (string)$plan->getId())

                                        <input
                                            type="checkbox"
                                            value="{{ $offeredPlanType->vars['value'] }}"
                                            name="{{ $offeredPlanType->vars['full_name'] }}"
                                            id="{{ $offeredPlanType->vars['id'] }}"
                                        @if($offeredPlanType->vars['checked'])
                                            checked="checked"
                                        @endif>

                                        {{--
                                          Mark field as rendered because we didn't use the
                                          template's rendering function
                                          --}}
                                        @php $offeredPlanType->setRendered() @endphp

                                    @endif
                                @endforeach

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
