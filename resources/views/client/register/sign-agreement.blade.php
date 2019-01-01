@extends('layouts.public')

@section('content')

    <section class="aompny-benefit">
        <div class="container">
            <h3 class="benefit-title text-black">Base Health & Services Agreement</h3>

            @formStart($form)

                <div class="payroll-agree">
                    Agreement goes here...
                </div>

                @formRow($form['agreementComplete'])
                {{--<input type="checkbox">--}}
                {{--<span class="agree-check text-black">I have read the Base Health agreement</span>--}}

                <button type="submit" class="btn btn-primary btn-done">SIGN</button>

                <div class="clearfix"></div>

            @formRest($form)
            @formEnd($form)

        </div>
    </section>

    <div class="push"></div>

@endsection
