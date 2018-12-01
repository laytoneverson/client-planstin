@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')
    <!-- body content -->
    <div class="col-md-9">
        <!-- Benefits -->
        <h3 class="side-bra-smi-h3 disply-inline">Benefits</h3>
        <a href="#" class="edit-benefit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

        <table class="table table-bordered benefit-table benefit-mgr">
            <thead>
            <tr>
                <th scope="col"><h4 class="benefit-head">Base Health Plan</h4></th>
                <th scope="col"><h4 class="benefit-head">Dental Plan</h4></th>
                <th scope="col"><h4 class="benefit-head">Vision Plan</h4></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><p class="company-detail benefit-detial">Preventive Basic</p></td>
                <td><p class="company-detail benefit-detial">The PPO</p></td>
                <td><p class="company-detail benefit-detial">Vision Plan</p></td>
            </tr>
            </tbody>
        </table>

        <!-- services -->
        <h3 class="side-bra-smi-h3 disply-inline">Services</h3>
        <a href="#" class="edit-benefit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

        <table class="table table-bordered benefit-table benefit-mgr footer-btm">
            <thead>
            <tr>
                <th scope="col"><h4 class="benefit-head">Payroll</h4></th>
                <th scope="col"><h4 class="benefit-head">HR</h4></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><p class="company-detail benefit-detial">Preventive Basic</p></td>
                <td><p class="company-detail benefit-detial">Vision Plan</p></td>
            </tr>
            </tbody>
        </table>

    </div>
    </div>
    </div>
    <div class="push"></div>
    </div>


@endsection
