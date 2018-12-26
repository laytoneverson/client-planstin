@extends('layouts.portal-broker')

@section('content')

    <!-- body content -->
    <h3 class="">Your Profile</h3>
    <table class="tabe profile-table w-100 table-lg mb-4 mt-4">
        <tr>
            <th>Brokerage/Agency name</th>
            <td>Glide Installations LLC</td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td>Damon Andrews</td>
        </tr>
        <tr>
            <th>E-mail Address</th>
            <td>damon@glideinstalattions.com</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>435-867-8876</td>
        </tr>
        <tr>
            <th>Mailing address</th>
            <td>2629 E. Craig Road, Suite H, North Las Vegas, NV 89030</td>
        </tr>
    </table>

    <div class="text-right">
        <button class="btn btn-lg btn-link btn-black"><i class="fa fa-pencil"></i> Edit Profile</button>
    </div>
@endsection
