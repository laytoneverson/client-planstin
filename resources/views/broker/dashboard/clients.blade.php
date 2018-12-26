@extends('layouts.portal-broker')

@section('content')

    <!-- body content -->
    <h3 class="">Your Bank Information</h3>
    <div class="row">
        <div class="col-sm-8">
            <table class="tabe profile-table w-100 table-lg mb-4 mt-4">
                <tr>
                    <th>Client One</th>
                    <td>email@one.com</td>
                </tr>
                <tr>
                    <th>Client Two</th>
                    <td>email@two.com</td>
                </tr>
                <tr>
                    <th>Client Three</th>
                    <td>email@three.com</td>
                </tr>
                <tr>
                    <th>Client Four</th>
                    <td>email@four.com</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mt-4">Add Client</h4>
            <form action="">
                <div class="form-group">
                    <label>Client's Business Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>E-mail Address</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group text-right">
                    <div class="btn btn-red">Submit</div>
                </div>
            </form>
        </div>
    </div>
@endsection
