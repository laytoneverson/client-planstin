@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')

    <!-- body content -->
    <div class="col-md-9">
        <h3 class="side-bra-smi-h3 disply-inline">Comapny Profile</h3>
        <a href="#" class="edit-benefit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

        <table class="table table-bordered company-table">
            <tbody>
            <tr>
                <th width="150px" class="th-1" scope="row"><p class="company-title">Company Name</p></th>
                <td><p class="company-detail">Glide Installation LLC</p></td>
            </tr>
            <tr>
                <th class="th-1" scope="row"><p class="company-title">Business Tax ID</p></th>
                <td><p class="company-detail">00-00000000</p></td>
            </tr>
            <tr>
                <th class="th-1" scope="row"><p class="company-title">Business Address</p></th>
                <td><p class="company-detail">11013 ,Road 23 ,home 43 ,Las vegas</p></td>
            </tr>
            <tr>
                <th class="th-1" scope="row"><p class="company-title">Primary Contact</p></th>
                <td><p class="company-detail">11013 ,Road 23 ,home 43 ,Las vegas</p></td>
            </tr>
            <tr>
                <th class="th-1" scope="row"><p class="company-title">Billing Contact</p></th>
                <td><p class="company-detail">11013 ,Road 23 ,home 43 ,Las vegas</p></td>
            </tr>
            <tr>
                <th class="th-1" scope="row"><p class="company-title">Payment Method</p></th>
                <td><p class="company-detail">Account ending in *********5665</p></td>
            </tr>

            </tbody>
        </table>

    </div>
    </div>
    <hr class="btm-bdr">
    </div>
    <div class="push"></div>
    </div>

@endsection
