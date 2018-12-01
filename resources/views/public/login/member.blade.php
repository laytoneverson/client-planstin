@extends($includes->body)

@section('content')
<div class="container">
    @if( $errorMessage )
        <div class="alert alert-danger">{{ $errorMessage }}</div>
    @endif
    @if( $successMessage )
        <div class="alert alert-sucess">{{ $successMessage }}</div>
    @endif
    <div class="row">
        <div class="col-12 col-lg-6">

        </div>
        <div class="col-12 col-lg-6">
            <h1>Login Form</h1>
        </div>
    </div>
</div>


@endsection