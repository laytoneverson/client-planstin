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
                        <h3 class="recovery-text text-white">Insert your e-mail address and we will send you a recovery link</h3>
                        <div class="form-group">
                            <label class="login-input-label text-white" for="exampleInputEmail1">E-mail address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your email address">
                            <small class="form-text text-white text-right">Wrong username </small>
                        </div>
                        <button type="submit" class="btn btn-block btn-submit btn-black text-white">send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
