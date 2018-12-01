@extends('includes.body-login')

@section('content')

    <!-- login body content -->
    <section class="login-body">
        <div class="container">
            <div class="row login-container">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img class="img-fluid banner-img" src="{{asset('images/AdobeStock_6423841.png')}}" alt="banner-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form class="login-field">
                        <h2 class="cmpny-text text-black">Employee Login</h2>
                        <div class="form-group">
                            <label class="login-input-label text-black" for="exampleInputPassword1">New password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New password">
                        </div>
                        <div class="form-group">
                            <label class="login-input-label text-black" for="exampleInputPassword1">Confirm password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm password">
                            <small class="form-text text-muted text-red text-right">Password did not match</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-submit bg-red text-white pass-r-m-b">reset</button>
                        <p class="forgot-pass no-mgr-top text-black">Don't have account yet? <a class="text-red" href="#">Sign up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="push"></div>
    </div>
    <!-- login body content end-->



@endsection
