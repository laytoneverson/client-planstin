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
                    <form class="login-field" action="@php route('login.client') @endphp">
                        <h2 class="cmpny-text text-white">Broker Login</h2>
                        <div class="form-group">
                            <label class="login-input-label text-white" for="exampleInputEmail1">E-mail address</label>
                            <input type="email" name="username" class="form-control" id="exampleInputEmail1" placeholder="Your email address">
                        </div>
                        <div class="form-group">
                            <label class="login-input-label text-white" for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password" name="password">
                            <small class="form-text text-white text-right">Wrong username Or password</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-submit btn-black">Sign In</button>
                        <p class="forgot-pass no-mgr-bottom text-white">Forgot password or username? <a class="btn-link btn-black" href="{{ route('broker.forgot') }}">Click Here</a></p>
                        <p class="forgot-pass no-mgr-top text-white">Don't have account yet? <a class="btn-link btn-black" href="{{ route('broker.signup') }}">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- login body content end-->

@endsection
