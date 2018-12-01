@extends($includes->body)

@section('content')

    <!--select company benefit-->
    <section class="aompny-benefit">
        <div class="container">
            <h3 class="benefit-title text-black">Choose your company benefits offered to your employees</h3>
            <form action="">
                <ul class="faq">
                    <li class="q"><span>Base Health</span><img class="arrow-rotate" src="{{asset('images/arrow.png')}}"></li>
                    <li class="a" style="display: list-item;">
                        <ul class="plans">
                            <!-- plan 1 -->
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <h3 class="text-black plan-title">Basic Plan</h3>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <h3 class="text-black plan-title"> Plan Outline </h3>
                                                <a href="#" class="outline-down text-gray-3"><i class="fa fa-download" aria-hidden="true"></i><span>download outline</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-8">
                                                <h3 class="text-black plan-title">Rates</h3>
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee</p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$50</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Spouse </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$75</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Child </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$75</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Family </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$100</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4">
                                                <div class="row">
                                                    <div class="col-xs-6 col-md-6">
                                                        <h3 class="text-black plan-title">Add</h3>
                                                    </div>
                                                    <div class="col-xs-6 col-md-6">
                                                        <p class="plan-check"> <input type="checkbox"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- plan2 -->
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <h3 class="text-black plan-title">HSA Plan</h3>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <h3 class="text-black plan-title"> Plan Outline </h3>
                                                <a href="#" class="outline-down text-gray-3"><i class="fa fa-download" aria-hidden="true"></i><span>download outline</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-8">
                                                <h3 class="text-black plan-title">Rates</h3>
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee</p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$50</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Spouse </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$75</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Child </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$75</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Family </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$100</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4">
                                                <div class="row">
                                                    <div class="col-xs-6 col-md-6">
                                                        <h3 class="text-black plan-title">Add</h3>
                                                    </div>
                                                    <div class="col-xs-6 col-md-6">
                                                        <p class="plan-check"> <input type="checkbox"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- plan3 -->
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <h3 class="text-black plan-title">Advanced Plan</h3>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <h3 class="text-black plan-title"> Plan Outline </h3>
                                                <a href="#" class="outline-down text-gray-3"><i class="fa fa-download" aria-hidden="true"></i><span>download outline</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-8">
                                                <h3 class="text-black plan-title">Rates</h3>
                                                <div class="row">
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee</p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$50</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Spouse </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$75</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Child </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$75</p>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-9 col-md-9">
                                                        <p class="emp-rate">Employee & Family </p>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-3 col-md-3">
                                                        <p class="emp-rate">$100</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-4">
                                                <div class="row">
                                                    <div class="col-xs-6 col-md-6">
                                                        <h3 class="text-black plan-title">Add</h3>
                                                    </div>
                                                    <div class="col-xs-6 col-md-6">
                                                        <p class="plan-check"> <input type="checkbox"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- plan3 ended -->
                        </ul>
                    </li>

                    <li class="q"><span>Catastrophic</span><img class="arrow-rotate" src="{{asset('images/arrow.png')}}"></li>
                    <li class="a">

                    </li>

                    <li class="q"><span>Dental</span><img class="arrow-rotate" src="{{asset('images/arrow.png')}}"></li>
                    <li class="a">

                    </li>

                    <li class="q"><span>Vision</span><img class="arrow-rotate" src="{{asset('images/arrow.png')}}"></li>
                    <li class="a">

                    </li>

                    <li class="q"><span>Supplemental</span><img class="arrow-rotate" src="{{asset('images/arrow.png')}}"></li>
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
    <!-- select company benefit- end-->



@endsection
