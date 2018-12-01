@extends($includes->body)

@section('content')

<div class="container">
    <div class="row"> 
        @include($includes->sidebar)
        <!-- body content -->
        <div class="col-md-9 emp-sec">

            <h3 class="side-bra-smi-h3 disply-inline">Billing Profile</h3>
            <div class="row billing">
                <div class="col-sm-6">
                    <div class="card bg-red">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="b-plans">
                                        <li>Basic Health Plan</li>
                                        <li>Dental Plan</li>
                                        <li>Vision Plan</li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <h2 class="bill-amount">$557.95</h2>
                                </div>
                            </div>
                            <div class="row pay-process">
                                <div class="col-6">
                                    <p class="bill-date">Due Date: 11/1/18</p>
                                </div>
                                <div class="col-6">
                                    <center><a href="#" class="btn btn-primary bill-pay">PAY NOW</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card bg-red footer-mgr">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="b-plans">
                                        <li>Full payroll service</li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <h2 class="bill-amount">$100.00</h2>
                                </div>
                            </div>
                            <div class="row pay-process-2">
                                <div class="col-6">
                                    <p class="bill-date">Due Date: 11/1/18</p>
                                </div>
                                <div class="col-6">
                                    <center><a href="#" class="btn btn-primary bill-pay">PAY NOW</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- see invoices -->
            <h3 class="side-bra-smi-h3 disply-inline"><img class="invoice-icon" src="{{asset('/images/invoice.png')}}" alt="">See Your Invoices</h3>

            <ul class="invoice-list">
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>Current</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>9/1/18</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>9/1/18</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>9/1/18</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="next-img" src="{{asset('/images/next.png')}}" alt="invoice">
                    </a>
                </li>

            </ul>

            <div class="clearfix"></div>

            <ul class="invoice-list invoice-list-2">
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>Current</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>9/1/18</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>9/1/18</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="pdf-img" src="{{asset('/images/pdf.png')}}" alt="invoice"> <br>
                        <span>9/1/18</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-black">
                        <img class="next-img" src="{{asset('/images/next.png')}}" alt="invoice">
                    </a>
                </li>
                <div class="clearfix"></div>

            </ul>

            <!--Payment method-->
            <h3 class="side-bra-smi-h3 disply-inline"><img class="invoice-icon" src="{{asset('/images/card-icon.png')}}" alt="">Your Payment method</h3>
            <br>
            <a class="paument-type-edit text-black" href="#"><span>ACH Account</span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

            <ul class="account-info">
                <li>
                    <div class="row">
                        <div class="col-6">
                            <p>Routing Number</p>
                        </div>
                        <div class="col-6">
                            <p>25469352</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-6">
                            <p>Account Number</p>
                        </div>
                        <div class="col-6">
                            <p>25114254</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-6">
                            <p>Account name</p>
                        </div>
                        <div class="col-6">
                            <p>Checking </p>
                        </div>
                    </div>
                </li>

            </ul>

            <!-- payment method change -->
            <h4 class="paument-type-edit text-black" href="#"><span>Change Payment Method</span></h4>

            <ul class="checkPayMethod bill-pay-method">
                <li>
                    <input class="check" type="checkbox"><span class="text-gray-3">ACH</span>
                </li>
                <li>
                    <input class="check" type="checkbox"><span class="text-gray-3">Debit Card</span>
                </li>
                <li>
                    <input class="check" type="checkbox"><span class="text-gray-3">Credit Card</span>
                </li>
                <li>
                    <input class="check" type="checkbox"><span class="text-gray-3">Invoice</span>
                </li>
                <li>
                    <input class="check" type="checkbox"><span class="text-gray-3">Check</span>
                </li>
            </ul>
            <!-- payment method change end -->

            <div class="clearfix"></div>

            <div class="footer-mgr"></div>

        </div>
    </div>
    <div class="push"></div>
</div>
    <!-- body content  end-->



@endsection
