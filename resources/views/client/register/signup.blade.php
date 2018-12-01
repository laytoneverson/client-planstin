@extends('layouts.public')

@section('content')

    <!-- registration body content -->
    <section class="login-body">
        <div class="container">
            <div class="row login-container">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img class="img-fluid banner-img" src="{{asset('images/AdobeStock_6423841.png')}}" alt="banner-img">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    @formStart($form, ['attr' => ['class' => 'login-field register-field'] ])
                        
                    <h2 class="cmpny-text text-black">Company Registration</h2>
                    @formRow(
                        $form['email'], 
                        [
                            'attr' =>  [
                                'class' => '',
                                'placeholder' => 'Your email address',
                            ],
                            'label' => 'E-mail Address',
                            'label_attr' => ['class' => 'login-input-label text-black']
                        ] 
                    )   
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="login-input-label text-black" for="exampleInputPassword1">Password</label>
                            @formWidget($form['password']['first'], [
                                'attr' => [
                                    'placeholder' => 'Your Password',
                                ]
                            ])
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password"> -->
                        
                        </div>
                        <div class="form-group col-md-6">
                            <label class="login-input-label text-black" for="exampleInputPassword1">Confirm password</label>
                            @formWidget($form['password']['second'], [
                                'attr' => [
                                    'placeholder' => 'Confirm Password'
                                ]
                            ])
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password"> -->
                        </div>
                    </div>
                    @formRest($form)

                    <input class="" type="checkbox" required>
                    <span class="terms text-black">I have read the Privacy Policy and agree to the Terms of Service.</span>
                    <button type="submit" class="btn btn-primary btn-submit bg-red text-white btn-regis">register</button>
                    @formEnd($form)
                   
                    <!-- <form class="login-field register-field">
                        <div class="form-group">
                            <label class="login-input-label text-black" for="exampleInputEmail1">E-mail address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your email address">
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="login-input-label text-black" for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="login-input-label text-black" for="exampleInputPassword1">Confirm password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your password">
                            </div>
                        </div>

                        
                        <div class="clearfix"></div>
                    </form> -->
                </div>
            </div>
        </div>
    </section>
    <div class="push"></div>
    </div>
    <!-- registration body content end-->



@endsection
