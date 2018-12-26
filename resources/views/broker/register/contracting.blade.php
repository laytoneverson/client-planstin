@extends('layouts.public')

@section('content')

    <!-- business body content -->
    <section class="businees-pro-cre">
        <div class="container">
            <h2 class="busi-p-cre-head text-black">Broker Enrollment</h2>
            
            <form action="" class="user-data emp-data-2">
                <div class="row">
                    <div class="col-md-3">
                        <!-- upload file -->
                        <input id="upload" type="file"/>
                        <a href="" id="upload_link">
                            <div class="img-upload img-upload-1">
                                <img class="up-plus" src="{{asset('images/up-plus.png')}}" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <h3 class="emp-info-fill">Are you a broker or affiliate?</h3>
                <div class="form-group">
                    
                    <label class="mr-3">
                        <input type="radio" name="broker_type" value="broker" checked>
                        Broker
                    </label>
                    <label>
                        <input type="radio" name="broker_type" value="affiliate">
                        Affiliate
                    </label>
                </div>

              
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="emp-info-fill">Broker Information</h3>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="data-input-label text-black mgr-b" >Agency/Brokerage Name</label>
                            <input type="text" class="form-control" name="broker_name" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="data-input-label text-black mgr-b" >Business Name (If Affiliate)</label>
                            <input type="text" class="form-control" name="business_name" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="data-input-label text-black mgr-b" >Your First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="data-input-label text-black mgr-b" >Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="data-input-label text-black mgr-b" >Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label class="data-input-label text-black mgr-b" >Email</label>
                            <input type="email" class="form-control" name="email" placeholder="">
                        </div>
                    </div>
                </div>


                <h4 class="adr-info mt-5">Address</h4>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="input-detail text-gray-3">Street Address</span>
                            <input type="text" class="form-control" name="address_1" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <span class="input-detail text-gray-3">Address Line 2   </span>
                            <input type="text" class="form-control" name="address_2" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="input-detail text-gray-3">City </span>
                            <input type="text" class="form-control" name="city" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="input-detail text-gray-3">Province/State* </span>
                                    <input type="text" class="form-control" name="state" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <span class="input-detail text-gray-3">Postcode/Zip* </span>
                                    <input type="text" class="form-control" name="zip" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <h2 class="busi-p-cre-head text-black">Uploads</h2>

                <table class="table broker-upload-table w-100">
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Status</th>
                            <th>Attach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Agent License</td>
                            <td>Required</td>
                            <td>
                                <button class="btn btn-sm btn-red">Attach</button>
                            </td>
                        </tr>
                        <tr>
                            <td>W9</td>
                            <td>Required</td>
                            <td>
                                <button class="btn btn-sm btn-red">Attach</button>
                            </td>
                        </tr>
                        <tr>
                            <td>E&amp;0</td>
                            <td>Required</td>
                            <td>
                                <button class="btn btn-sm btn-red">Attach</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                


                <div class="form-group">

                    <button type="submit" class="btn text-white btn-done">Next</button>
                </div>

               
            </form>
            
        </div>
    </section>
    <div class="push"></div>
    </div>
    <!-- business body content end-->

@endsection
