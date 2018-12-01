@extends($includes->body)

@section('content')

<div class="container mgr-t-2">
    <div class="row">

        @include($includes->sidebar)

        <!-- body content -->
        <div class="col-md-9">
            <h3 class="welcome-msg">Welcome Damon!</h3>

            <div class="row">
                <div class="col-md-4">
                    <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-address-card-o" aria-hidden="true"></i><span>Company</span></a></p>
                </div>
                <div class="col-md-4">
                    <p class="center"><a href="#" class="dashboard-link text-red"><i class="fa fa-sliders" aria-hidden="true"></i>Services</a></p>
                </div>
                <div class="col-md-4">
                    <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-users" aria-hidden="true"></i>Employees</a></p>
                </div>
            </div>

            <div class="row mgrt-3">
                <div class="col-md-4">
                    <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-calculator" aria-hidden="true"></i>Billing</a></p>
                </div>
                <div class="col-md-4">
                    <p class="center"><a href="#" class="dashboard-link text-red"><i class="fa fa-files-o" aria-hidden="true"></i>Documents</a></p>
                </div>
                <div class="col-md-4">
                    <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-cogs" aria-hidden="true"></i>Settings</a></p>
                </div>

            </div>

        </div>
    


        <div class="push"></div>
        </div>

    </div>
</div>
@endsection
