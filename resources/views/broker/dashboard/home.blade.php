@extends('layouts.portal-broker')

@section('content')

    <!-- body content -->

    <h3 class="welcome-msg">Welcome Damon!</h3>

    <div class="row">
        <div class="col-md-4">
            <p class="center"> <a href="{{route('broker.profile')}}" class="dashboard-link text-red"><i class="fa fa-address-card-o" aria-hidden="true"></i><span>Profile</span></a></p>
        </div>
        <div class="col-md-4">
            <p class="center"><a href="{{route('broker.deposit')}}" class="dashboard-link text-red"><i class="fa fa-sliders" aria-hidden="true"></i>Direct Deposit</a></p>
        </div>
        <div class="col-md-4">
            <p class="center"> <a href="{{route('broker.clients')}}" class="dashboard-link text-red"><i class="fa fa-users" aria-hidden="true"></i>Clients</a></p>
        </div>
    </div>

    <div class="row mgrt-3">
        <div class="col-md-4">
            <p class="center"> <a href="{{route('broker.statements')}}" class="dashboard-link text-red"><i class="fa fa-calculator" aria-hidden="true"></i>Statements</a></p>
        </div>
        <div class="col-md-4">
            <p class="center"><a href="{{route('broker.documents')}}" class="dashboard-link text-red"><i class="fa fa-files-o" aria-hidden="true"></i>Documents</a></p>
        </div>
        <div class="col-md-4">
            <p class="center"> <a href="{{route('broker.settings')}}" class="dashboard-link text-red"><i class="fa fa-cogs" aria-hidden="true"></i>Settings</a></p>
        </div>

    </div>

@endsection
