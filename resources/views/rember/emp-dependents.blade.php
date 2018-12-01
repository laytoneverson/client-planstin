@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')

    <!-- body content -->
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <!-- Your Benefits< -->
                <h3 class="side-bra-smi-h3 disply-inline">Your dependents</h3>

                <div class="row">
                    <form action="" class="user-data add-user">
                        <table class="table table-bordered benefit-table benefit-mgr emp-table reveiw-table benefit-table2" style="max-width: 750px">
                            <thead>
                            <tr>
                                <th scope="col"><h4 class="benefit-head">Name</h4></th>
                                <th scope="col"><h4 class="benefit-head">DOB</h4></th>
                                <th scope="col"><h4 class="benefit-head">SSN</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">Adonica Huck</h4>
                                        <p style="font-size: 12px;margin-bottom: 0px">wife</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">12/01/1985</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">0000000000</h4>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">Henry Carpenter</h4>
                                        <p style="font-size: 10px;margin-bottom: 0px">child</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">1/1/2015</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">0000000000</h4>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">Don Flores</h4>
                                        <p style="font-size: 12px;margin-bottom: 0px">Child</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">8/25/2010</h4>
                                    </div>
                                </td>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name2">0000000000</h4>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <p class="dend-txt" style="font-size: 22px;color: #080808;margin-top:80px;margin-bottom: 50px">If you need to add a dependent please <a href="#" style="color: red">SUBMIT</a>  a change of event!</p>


                        <div class="clearfix"></div>
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
