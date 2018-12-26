@extends('layouts.public')

@section('content')

    <!-- registration body content -->
    <section class="login-body bg-red">
        <div class="container">
            <div class="row login-container">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img class="img-fluid banner-img" src="{{asset('images/login-img.png')}}" alt="banner-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form class="login-field register-field">
                        <h2 class="cmpny-text text-white">Broker Registration</h2>
                        <div class="form-group">
                            <label class="login-input-label text-white" for="exampleInputEmail1">E-mail address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your email address">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="login-input-label text-white" for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="login-input-label text-white" for="exampleInputPassword1">Confirm password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password">
                            </div>
                        </div>

                        <input class="check" type="checkbox">
                        <span class="terms text-white">I have read the Privacy Policy and agree to the Terms of Service.</span>
                        <button type="submit" class="btn btn-submit btn-black btn-regis">register</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
