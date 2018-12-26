@extends('layouts.public')

@section('content')

    <!-- login body content -->
    <section class="login-body bg-red">
        <div class="container">
            <div class="row login-container">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img class="img-fluid banner-img" src="{{asset('images/login-img.png')}}" alt="banner-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form class="login-field">
                        <h2 class="cmpny-text text-white">Broker Login</h2>
                        <div class="form-group">
                            <label class="login-input-label text-white" for="exampleInputPassword1">New password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New password">
                        </div>
                        <div class="form-group">
                            <label class="login-input-label text-white" for="exampleInputPassword1">Confirm password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm password">
                            <small class="form-text text-white text-right">Password did not match</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-submit btn-black pass-r-m-b">reset</button>
                        <p class="forgot-pass no-mgr-top text-white"><a class="text-white" href="{{route('broker.login')}}"><i class="fa fa-arrow-left"></i> Back to Login</a></p>
                        <p class="forgot-pass no-mgr-top text-white">Don't have account yet? <a class="btn-link btn-black" href="{{ route('broker.signup') }}">Sign Up</a></p>


                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
