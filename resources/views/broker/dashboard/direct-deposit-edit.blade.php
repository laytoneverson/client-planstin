@extends('layouts.portal-broker')

@section('content')

<h2>Direct Deposit Setup</h2>

<div class="row">
    <div class="col-sm-6">
        <form action="">
            <div class="form-group">
                <label>Bank Name</label>
                <select class="form-control">
                    <option value="">Bank Name</option>
                </select>
            </div>
            <div class="form-group">
                <label>Routing Number</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Account Number</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Account Type</label>
                <select class="form-control">
                    <option value="">Checking</option>
                    <option value="">Saving</option>
                </select>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-red">Save</button>
            </div>
        </form>  
    </div>
</div>

@endsection