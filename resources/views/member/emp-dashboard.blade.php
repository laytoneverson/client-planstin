@extends($includes->body)

@section('content')

    @include('includes.sidebar')

    <!-- body content -->
    <div class="col-md-9">
        <h3 class="welcome-msg">Welcome Damon!</h3>

        <div class="row">
            <div class="col-md-4">
                <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-address-card-o" aria-hidden="true"></i><span>Employer</span></a></p>
            </div>
            <div class="col-md-4">
                <p class="center"><a href="#" class="dashboard-link text-red"><i class="fa fa-sliders" aria-hidden="true"></i>Benefits</a></p>
            </div>
            <div class="col-md-4">
                <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-users" aria-hidden="true"></i>Dependents</a></p>
            </div>
        </div>

        <div class="row mgrt-3">
            <div class="col-md-4">
                <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-calculator" aria-hidden="true"></i>Submit Event</a></p>
            </div>
            <div class="col-md-4">
                <p class="center"><a href="#" class="dashboard-link text-red"><i class="fa fa-files-o" aria-hidden="true"></i>Agreement</a></p>
            </div>
            <div class="col-md-4">
                <p class="center"> <a href="#" class="dashboard-link text-red"><i class="fa fa-cogs" aria-hidden="true"></i>Settings</a></p>
            </div>

        </div>

    </div>
    </div>
    <hr class="btm-bdr">
    </div>
    <!-- service added  end-->
    <div class="push"></div>
    </div>

@endsection
