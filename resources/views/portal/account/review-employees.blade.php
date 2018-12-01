@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')

    <!-- body content -->
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <!-- Your Benefits< -->
                <h3 class="side-bra-smi-h3 disply-inline">Review your employees</h3>
                <a href="#" class="edit-benefit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                <div class="row">
                    <form action="" class="user-data add-user">
                        <table class="table table-bordered benefit-table benefit-mgr emp-table reveiw-table">
                            <thead>
                            <tr>
                                <th scope="col"><h4 class="benefit-head">Employees</h4></th>
                                <th scope="col"><h4 class="benefit-head">Actions</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Adoncia Huck</h4>
                                        <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Adoncia Huck</h4>
                                        <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="emp-detail-r">
                                        <h4 class="emp-n-name">Adoncia Huck</h4>
                                        <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <button class="add-more-btn mgr-l-review" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add Employee</button>


                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-primary btn-done mgr-r">DONE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    </div>
    </div>
    <div class="push"></div>
    </div>
    


@endsection
