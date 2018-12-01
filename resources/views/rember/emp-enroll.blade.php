@extends($includes->body)

@section('content')

    <!-- business body content -->
    <section class="businees-pro-cre">
        <div class="container">
            <h2 class="busi-p-cre-head text-black">Employee Enrollment</h2>
            <div class="row">
                <form action="" class="user-data emp-data-2">
                    <div class="col-md-3">
                        <!-- upload file -->
                        <input id="upload" type="file"/>
                        <a href="" id="upload_link">
                            <div class="img-upload img-upload-1">
                                <img class="up-plus" src="{{asset('images/up-plus.png')}}" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="emp-info-fill">Employee Information</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="from-group">
                                            <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Prefix</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Middle</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Last</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Prefix</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Social Security Number or tax ID*</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Date of Hire</label>
                                <div class="row date-of-h">
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="DD">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Birth</label>
                                <div class="row date-of-h">
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="MM">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="DD">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-6">
                                <label class="data-input-label text-black mgr-b" for="">Gender</label>
                                <input type="radio" name="gender"><span class="gnSl">Male</span>
                                <input type="radio" name="gender"><span class="gnSl">Female</span>
                            </div>
                        </div>

                        <h3 class="adr-info">Address</h3>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="input-detail text-gray-3">Street Address</span>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="input-detail text-gray-3">Address Line 2   </span>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="input-detail text-gray-3">City </span>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="input-detail text-gray-3">Province/State* </span>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="input-detail text-gray-3">Postcode/Zip* </span>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h3 class="emp-info-fill coverage">Coverage Type</h3>
                                <select name="" id="" class="form-control coverage-sl">
                                    <option value="">Employee Only</option>
                                </select>
                            </div>

                            <div class="col-md-12 emp-dpnd">
                                <h3 class="emp-info-fill coverage coverage2">Employee dependents</h3>
                                <input type="radio" name="dpnd"><span class="gnSl">Spouse</span>
                                <input type="radio" name="dpnd"><span class="gnSl">Child</span>
                            </div>


                        </div>

                        <div class="emp-dpnd-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="from-group">
                                                <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Prefix</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Middle</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Last</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Prefix</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Social Security Number or tax ID*</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="data-input-label text-black mgr-b" for="exampleInputEmail1">Birth</label>
                                    <div class="row date-of-h">
                                        <div class="col-md-3 col-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  placeholder="MM">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="DD">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="YYYY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="data-input-label text-black mgr-b mgr-b-4" for="">Gender</label>
                                    <input type="radio" name="gender"><span class="gnSl">Male</span>
                                    <input type="radio" name="gender"><span class="gnSl">Female</span>
                                </div>
                            </div>
                        </div>


                        <div class="row emp-add-2">
                            <button class="add-more-btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add Employee</button>
                        </div>


                        <!-- benefit -->
                        <h3 class="emp-info-fill">Choose your benefits</h3>

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


                        <div class="col-md-12">

                            <button type="submit" class="btn btn-primary btn-submit bg-red text-white btn-regis btn-save">save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="push"></div>
    </div>
    <!-- business body content end-->

@endsection
