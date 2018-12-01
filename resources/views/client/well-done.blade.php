@extends($includes->body)

@section('content')

<div class="container">
    <div class="row"> 
        @include($includes->sidebar)

        <!-- body content -->
        <div class="col-md-9">
            <div class="go-srtp-3 well-done-step">
                <img class="well-done-img" src="/images/ok-icon.png" alt="">
                <p class="success-text text-gray-3 well-done-text">Well done,<br>
                    You can give yourself big thumbs up! <br>
                    You have completed all the steps.
                </p>
                <div class="clearfix"></div>
            </div>
            <p class="step-btn step-btn-1"><a href="#" class="btn btn-primary btn-lg bg-red">GO TO HOME</a></p>

        </div>
    </div>
    <div class="push"></div>
</div>

@endsection
