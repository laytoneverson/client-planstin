@extends('layouts.portal-member')

@section('content')

    <!-- body content -->

    <h3 class="welcome-msg">Welcome Damon!</h3>

    <div class="row">
        <div class="col-md-4">
            <p class="center"> <a href="{{route('member.employer')}}" class="dashboard-link text-red"><i class="fa fa-address-card-o" aria-hidden="true"></i><span>Employer</span></a></p>
        </div>
        <div class="col-md-4">
            <p class="center"><a href="{{route('member.benefits')}}" class="dashboard-link text-red"><i class="fa fa-sliders" aria-hidden="true"></i>Benefits</a></p>
        </div>
        <div class="col-md-4">
            <p class="center"> <a href="{{route('member.dependents')}}" class="dashboard-link text-red"><i class="fa fa-users" aria-hidden="true"></i>Dependents</a></p>
        </div>
    </div>

    <div class="row mgrt-3">
        <div class="col-md-4">
            <p class="center"> <a href="{{route('member.submit-event')}}" class="dashboard-link text-red"><i class="fa fa-calculator" aria-hidden="true"></i>Submit Event</a></p>
        </div>
        <div class="col-md-4">
            <p class="center"><a href="{{route('member.agreement')}}" class="dashboard-link text-red"><i class="fa fa-files-o" aria-hidden="true"></i>Agreement</a></p>
        </div>
        <div class="col-md-4">
            <p class="center"> <a href="{{route('member.settings')}}" class="dashboard-link text-red"><i class="fa fa-cogs" aria-hidden="true"></i>Settings</a></p>
        </div>

    </div>

@endsection
