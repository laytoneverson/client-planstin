@extends('includes.body-admin')

@section('content')

    <!--select your services-->
    <section class="aompny-benefit">
        <div class="container">
            <h3 class="benefit-title text-black">Choose your Services</h3>
            <form action="">
                <ul class="faq">
                    <li class="q"><span>Payroll</span><img class="arrow-rotate" src="/images/arrow.png"></li>
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
                                            <input type="radio" name="service"></p>
                                    </div>
                                </div>
                            </li>

                            <!-- plan2 -->

                            <li>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3 class="text-red plan-title">Full Service Payroll</h3>
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
                                            <input type="radio" name="service"></p>
                                    </div>
                                </div>
                            </li>
                            <!-- plan2 end-->

                        </ul>
                    </li>

                    <li class="q"><span>HR Suite</span><img class="arrow-rotate" src="/images/arrow.png"></li>
                    <li class="a">

                    </li>

                </ul>

                <button type="submit" class="btn btn-primary btn-done">Done</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </section>
    <div class="push"></div>
    </div>
    <!-- select your services end-->



@endsection
