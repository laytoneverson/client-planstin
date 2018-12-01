@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')
    <!-- body content -->
    <div class="col-md-9 emp-sec">

        <div class="row">
            <div class="col-md-6 vertical-bdr">
                <h3 class="side-bra-smi-h3 disply-inline">Login information</h3>

                <form class="login-field settings-field">
                    <div class="form-group">
                        <label class="login-input-label text-black" for="exampleInputEmail1">Name</label>
                        <div class="field-edit">
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Your name" value="Damon Andrews">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="login-input-label text-black" for="exampleInputEmail1">E-mail address</label>
                        <div class="field-edit">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your email address" value="damon@glideinstallations.com">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="login-input-label text-black" for="exampleInputPassword1">Password</label>
                        <div class="field-edit">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Your password" value="Glide4m3!">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger settings-save-btn bg-red">SAVE</button>
                </form>
            </div>
            <div class="col-md-6">

                <h3 class="side-bra-smi-h3 disply-inline">Users</h3>

                <table class="table benefit-table benefit-mgr emp-table settings-table">
                    <tbody>

                    <tr>
                        <td>
                            <div class="emp-detail-r"><h4 class="emp-n-name">Adoncia Huck</h4>
                                <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p></div>
                        </td>
                        <td>
                            <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                    </tr>

                    <tr>
                        <td>
                            <div class="emp-detail-r"><h4 class="emp-n-name">Adoncia Huck</h4>
                                <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p></div>
                        </td>
                        <td>
                            <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                    </tr>

                    </tbody>
                </table>
                <button class="add-more-btn add-emp-m" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button>
            </div>

        </div>

    </div>
    </div>
    </div>
    <div class="push"></div>
    </div>


@endsection
