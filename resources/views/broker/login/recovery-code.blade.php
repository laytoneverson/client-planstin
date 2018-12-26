@extends('layouts.public')

@section('content')

    <!-- recovery body content -->
    <section class="login-body bg-red">
        <div class="container">
            <div class="row login-container">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img class="img-fluid banner-img" src="{{asset('images/login-img.png')}}" alt="banner-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form class="login-field">
                        <h2 class="cmpny-text text-white">Broker Login</h2>
                        <h3 class="recovery-text text-white">Insert recovery code</h3>
                        <div class="form-group">
                            <label class="login-input-label text-white" for="exampleInputEmail1">Recovery Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Insert Code">
                            <small class="form-text text-white text-right">Wrong Code </small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-submit btn-black">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
