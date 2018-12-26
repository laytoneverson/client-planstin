@extends('layouts.portal-member')

@section('content')
    <!-- body content -->
 
    <h3 class="side-bra-smi-h3 disply-inline">Your Employer</h3>
    <!-- <a href="#" class="edit-benefit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->

    <table class="table table-bordered w-100 company-table">
        <tbody>
        <tr>
            <th width="150px" class="th-1" scope="row"><p class="company-title">Company Name</p></th>
            <td><p class="company-detail">Glide Installation LLC</p></td>
        </tr>
        <tr>
            <th class="th-1" scope="row"><p class="company-title">Business Address</p></th>
            <td><p class="company-detail">2629 E. Craig Road, Suite H, North Las Vegas, NV 89030</p></td>
        </tr>
        <tr>
            <th class="th-1" scope="row"><p class="company-title">Contact Name</p></th>
            <td><p class="company-detail">Damon Andrews <br> damon@glideinstalattions.com<br> 435-867-8876</p></td>
        </tr>
        <tr>
            <th class="th-1" scope="row"><p class="company-title">Contact Phone</p></th>
            <td><p class="company-detail">00-0000000000</p></td>
        </tr>

        </tbody>
    </table>


@endsection
