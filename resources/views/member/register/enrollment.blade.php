@extends('layouts.public')

@section('content')
    <!-- business body content -->
    <section class="businees-pro-cre">
        <div class="container">
            <h2 class="busi-p-cre-head text-black">Employee Enrollment</h2>
            <div class="row">
                <form action="" class="user-data emp-data-2">
                    <div class="col-md-3">
                        <!-- upload file -->
                        {{--<input id="upload" type="file"/>--}}
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

                            <div class="col-md-4">
                                @formRow($form['firstName'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>

                            <div class="col-md-2">
                                @formRow($form['middleInitial'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>

                            <div class="col-md-4">
                                @formRow($form['lastName'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>

                            <div class="col-md-2">
                                @formRow($form['prefix'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <label class="data-input-label text-black mgr-b">Date Of Birth</label>
                                <div class="row date-of-h">
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            @formRow($form['birthDate']['month'], [
                                                'label' => false,
                                                'attr' => ['placeholder' => 'MM'],
                                            ])
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            @formRow($form['birthDate']['day'], ['label' => false, 'attr' => ['placeholder' => 'DD']])
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-4">
                                        <div class="form-group">
                                            @formRow($form['birthDate']['year'], ['label' => false, 'attr' => ['placeholder' => 'YYYY']])
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                @formRow($form['socialSecurityNumber'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>

                            <div class="col-md-4">
                                @formRow($form['gender'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>
                        </div>

                        <h3 class="adr-info">Address</h3>

                        <div class="row">

                            <div class="col-md-6">
                                @formRow($form['address']['street1'], ['label_attr' => ['class' => 'input-detail text-gray-3']])
                            </div>
                            <div class="col-md-6">
                                @formRow($form['address']['street2'], ['label_attr' => ['class' => 'input-detail text-gray-3']])
                            </div>
                            <div class="col-md-6">
                                @formRow($form['address']['city'], ['label_attr' => ['class' => 'input-detail text-gray-3']])
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        @formRow($form['address']['state'], ['label_attr' => ['class' => 'input-detail text-gray-3']])

                                    </div>
                                    <div class="col-md-6">
                                        @formRow($form['address']['postalCode'], ['label_attr' => ['class' => 'input-detail text-gray-3']])
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-4">
                                @formRow($form['phone'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>
                            <div class="col-md-4">
                                @formRow($form['email'], ['label_attr' => ['class' => 'data-input-label text-black mgr-b']])
                            </div>
                            <div class="col-md-4">
                                <label class="data-input-label text-black mgr-b">Date Of Hire</label>
                                <div class="row date-of-h">
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            @formRow($form['hireDate']['month'], [
                                                'label' => false,
                                                'attr' => ['placeholder' => 'MM'],
                                            ])
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            @formRow($form['hireDate']['day'], ['label' => false, 'attr' => ['placeholder' => 'DD']])
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-4">
                                        <div class="form-group">
                                            @formRow($form['hireDate']['year'], ['label' => false, 'attr' => ['placeholder' => 'YYYY']])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2"></div>

                        <h3 class="emp-info-fill coverage coverage2">Employee dependents</h3>

                        @formWidget($form['dependents'])

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
                            </li>

                        </ul>


                        <div class="col-md-12">
                            @formRest($form)
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
