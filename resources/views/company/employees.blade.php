@extends($includes->body)

@section('content')

<div class="container">
    <div class="row"> 
        @include($includes->sidebar)

        <!-- body content -->
        <div class="col-md-9 emp-sec">
            <h3 class="side-bra-smi-h3 disply-inline">Your Employess</h3>

            <table class="table table-bordered benefit-table benefit-mgr emp-table">
                <thead>
                <tr>
                    <th scope="col"><h4 class="benefit-head">Employees</h4></th>
                    <th scope="col"><h4 class="benefit-head">Benfits</h4></th>
                    <th scope="col"><h4 class="benefit-head">Cost</h4></th>
                    <th scope="col"><h4 class="benefit-head">Actions</h4></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td width="290px">
                        <div class="emp-pic">
                            <div class="img-cir">
                                <img class="profile-img" src="/images/ManSmile-300x215.png" alt="profile image">
                            </div>
                        </div>
                        <div class="emp-detail-r"><h4 class="emp-n-name">Adoncia Huck</h4>
                            <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p></div>
                    </td>
                    <td><p class="company-detail benefit-detial emp-col">Preventive Basic Dental PPO</p></td>
                    <td><p class="company-detail benefit-detial emp-col">$200</p></td>
                    <td>
                        <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                </tr>
                <tr>
                    <td width="290px">
                        <div class="emp-pic">
                            <div class="img-cir">
                                <img class="profile-img" src="/images/ManSmile-300x215.png" alt="profile image">
                            </div>
                        </div>
                        <div class="emp-detail-r"><h4 class="emp-n-name">Adoncia Huck</h4>
                            <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p></div>
                    </td>
                    <td><p class="company-detail benefit-detial emp-col">Preventive Basic Dental PPO</p></td>
                    <td><p class="company-detail benefit-detial emp-col">$200</p></td>
                    <td>
                        <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                </tr>
                <tr>
                    <td width="290px">
                        <div class="emp-pic">
                            <div class="img-cir">
                                <img class="profile-img" src="/images/ManSmile-300x215.png" alt="profile image">
                            </div>
                        </div>
                        <div class="emp-detail-r"><h4 class="emp-n-name">Adoncia Huck</h4>
                            <p class="company-detail benefit-detial emp-email-m">adoncia@glideinstallations.com</p></div>
                    </td>
                    <td><p class="company-detail benefit-detial emp-col">Preventive Basic Dental PPO</p></td>
                    <td><p class="company-detail benefit-detial emp-col">$200</p></td>
                    <td>
                        <button type="button" class="emp-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        <button type="button" class="emp-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                </tr>

                </tbody>
            </table>
            <button class="add-more-btn add-emp-m" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add Employee</button>
        </div>
    </div>
    <div class="push"></div>
</div>

@endsection
