@extends('layouts.public')

@section('content')
    @formStart($form)
    <!-- ======= select company benefit: services.blade.php start ======= -->
    <section class="aompny-benefit">
        <div class="container">
            <h3 class="benefit-title text-black">Choose your company benefits offered to your employees</h3>

            <ul class="faq">
                <!-- ====== Insurance Plans Start ====== -->
                @foreach($planCategories as $familyName => $plans)
                    @if(count($plans) >= 1)
                        @include('client.register.part-plan-group')
                    @endif
                @endforeach
                <!-- ====== Insurance Plans End ====== -->
            </ul>

            <h3 class="benefit-title text-black">Choose your services</h3>

            <ul class="faq">
                <li class="q"><span>Payroll & HR Suite</span><img class="arrow-rotate" src="/images/arrow.png"></li>
                <li class="a" style="display: list-item;">
                    <ul class="plans">
                        <!-- plan 1 -->
                        <li>
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="text-red plan-title">Owner's Payroll</h3>
                                </div>
                                <div class="col-md-4">

                                    <h4 class="text-black service-head">Online Portal</h4>
                                    <p class="text-black service-para">Employee can access paystubs online Employer payroll portal to submit payroll or contractor payments</p>

                                    <h4 class="text-black service-head">Direct Deposit</h4>
                                    <p class="text-black service-para">Payments to employees or contractors by direct deposit</p>

                                    <h4 class="text-black service-head">Local and Federal Taxes</h4>
                                    <p class="text-black service-para">Form Processing & Submission Tax Payments</p>

                                    <h4 class="text-black service-head">Annual Documents</h4>
                                    <p class="text-black service-para">FW2’s and other annual Documents 1099’s processing available</p>

                                </div>
                                <div class="col-md-4">
                                    <p class="bg-red text-white Select-txt">Select Service</p>
                                    <p class="service-selector">

                                        <input
                                            type="checkbox"
                                            value="{{ $form['isPayrollClient']->vars['value'] }}"
                                            name="{{ $form['isPayrollClient']->vars['full_name'] }}"
                                            id="{{ $form['isPayrollClient']->vars['id'] }}"
                                            @if($form['isPayrollClient']->vars['checked'])
                                                checked="checked"
                                            @endif>

                                        @php $form['isPayrollClient']->setRendered() @endphp

                                    </p>
                                </div>
                            </div>
                        </li>

                        <!-- plan2 -->

                        <li>
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="text-red plan-title">HR Suite</h3>
                                </div>

                                <div class="col-md-4">

                                    <h4 class="text-black service-head">Need Details</h4>
                                    <p class="text-black service-para"></p>

                                </div>
                                <div class="col-md-4">
                                    <p class="bg-red text-white Select-txt">Select Service</p>
                                    <p class="service-selector">
                                        <input
                                            type="checkbox"
                                            value="{{ $form['isBenefitsClient']->vars['value'] }}"
                                            name="{{ $form['isBenefitsClient']->vars['full_name'] }}"
                                            id="{{ $form['isBenefitsClient']->vars['id'] }}"
                                            @if($form['isBenefitsClient']->vars['checked'])
                                            checked="checked"
                                            @endif>

                                    @php $form['isBenefitsClient']->setRendered() @endphp
                                </div>
                            </div>
                        </li>
                        <!-- plan2 end-->

                    </ul>
                </li>
            </ul>

            <button type="submit" class="btn btn-primary btn-done">Continue</button>

            <div class="clearfix"></div>

        </div>
    </section>
    <div class="push"></div>

    <!-- select company benefit- end-->
    @formRest($form)
    @formEnd($form)
@endsection
