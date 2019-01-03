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

                    <h2 class="cmpny-text text-black">Employee Registration</h2>
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
                            @formWidget($form['plainPassword']['first'], [
                                'attr' => [
                                    'placeholder' => 'Your Password',
                                ]
                            ])
                        </div>
                        <div class="form-group col-md-6">
                            <label class="login-input-label text-black" for="exampleInputPassword1">Confirm password</label>
                            @formWidget($form['plainPassword']['second'], [
                                'attr' => [
                                    'placeholder' => 'Confirm Password'
                                ]
                            ])
                        </div>
                    </div>

                    @formRest($form)

                    <input class="check" type="checkbox">
                    <span class="terms text-black">I have read the Privacy Policy and agree to the Terms of Service.</span>
                    <button type="submit" class="btn btn-primary btn-submit bg-red text-white btn-regis">register</button>

                    <div class="clearfix"></div>

                    @formEnd($form)
                </div>
            </div>
        </div>
    </section>
    <div class="push"></div>

    <!-- registration body content end-->

@endsection
