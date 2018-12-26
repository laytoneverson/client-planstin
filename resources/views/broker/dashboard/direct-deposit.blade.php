@extends('layouts.portal-broker')

@section('content')

    <!-- body content -->
    <h3 class="">Your Bank Information</h3>
    <div class="row">
        <div class="col-sm-8">
            <table class="tabe profile-table w-100 table-lg mb-4 mt-4">
                <tr>
                    <th>Bank Name</th>
                    <td>Wells Fargo</td>
                </tr>
                <tr>
                    <th>Routing Number</th>
                    <td>xxx-xxx-xxxx</td>
                </tr>
                <tr>
                    <th>Account Number</th>
                    <td>xxxxxxxxxxxxxx</td>
                </tr>
                <tr>
                    <th>Account Type</th>
                    <td>Checking</td>
                </tr>
            </table>
        </div>
        <div class="col-sm-4">
            <a href="{{ route('broker.deposit.edit') }}" class="btn btn-lg btn-link btn-black"><i class="fa fa-pencil"></i> Edit Bank Info</a>
            <button class="btn btn-lg btn-link btn-black"><i class="fa fa-times"></i> Delete Bank Info</button>
        </div>
    </div>
    
@endsection
