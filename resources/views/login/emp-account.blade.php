@extends('includes.body-login')

@section('content')

    <!-- login body content -->
    <section class="login-body">
        <div class="container">
            <div class="row login-container">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img class="img-fluid banner-img" src="images/AdobeStock_6423841.png" alt="banner-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form class="login-field">
                        <h2 class="cmpny-text text-black">Employee Login</h2>
                        <div class="form-group">
                            <label class="login-input-label text-black" for="exampleInputEmail1">E-mail address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your email address">
                        </div>
                        <div class="form-group">
                            <label class="login-input-label text-black" for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password">
                            <small class="form-text text-muted text-red text-right">Wrong username Or password</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-submit bg-red text-white">sign in</button>
                        <p class="forgot-pass no-mgr-bottom text-black">Forgot password or username? <a class="text-red" href="#">Click Here</a></p>
                        <p class="forgot-pass no-mgr-top text-black">Don't have account yet? <a class="text-red" href="#">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- login body content end-->
    <div class="push"></div>
    </div>



@endsection
