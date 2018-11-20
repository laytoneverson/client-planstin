@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')


    <!-- body content -->
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <!-- Your Benefits< -->
                <h3 class="side-bra-smi-h3 disply-inline">Your Benifits</h3>

                <div class="row">
                    <form action="" class="user-data add-user">
                        <table class="table table-bordered benefit-table benefit-mgr emp-table reveiw-table benefit-table2">
                            <thead>
                            <tr>
                                <th scope="col"><h4 class="benefit-head">Base Health Plan</h4></th>
                                <th scope="col"><h4 class="benefit-head">Dental Plan</h4></th>
                                <th scope="col"><h4 class="benefit-head">Vision Plan</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Preventive Basic</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">The PPO</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Vision Plan</h4>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Family Coverage</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Family Coverage</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Family Coverage</h4>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name"><a href="#"><i class="fa fa-download" aria-hidden="true" ></i> Download Outline</a></h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name"><a href="#"><i class="fa fa-download" aria-hidden="true" ></i> Download Outline</a></h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name"><a href="#"><i class="fa fa-download" aria-hidden="true" ></i> Download Outline</a></h4>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            <p class="bottom-txt">If you have an event change to report click bellow</p>
                        </div>


                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-primary bg-red mgr-r report" style="float: right;padding-right:30px;padding-left:30px;">REPORT</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- body content end -->

    </div>
    </div>
    <div class="push"></div>
    </div>
    <!-- service added  end-->

@endsection
