@extends($includes->body)

@section('content')

    @include('includes.sidebar')

    <!-- body content -->
    <div class="col-md-9 emp-sec">

        <div class="row">
            <div class="col-md-10">
                <h3 class="side-bra-smi-h3 disply-inline">Login information</h3>

                <form class="login-field settings-field emp-login-field">
                    <div class="form-group">
                        <label class="login-input-label text-black" for="exampleInputNamesettings">Name</label>
                        <div class="field-edit">
                            <input type="text" class="form-control exampleInputNamesettings" placeholder="Your name" value="Damon Andrews">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="login-input-label text-black" for="exampleInputEmailsettings">E-mail address</label>
                        <div class="field-edit">
                            <input type="email" class="form-control exampleInputNamesettings" placeholder="Your email address" value="damon@glideinstallations.com">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" id="iconOfEmail"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="login-input-label text-black" for="exampleInputPasswordsettings">Password</label>
                        <div class="field-edit">
                            <input type="text" class="form-control exampleInputNamesettings" placeholder="Your password" value="Glide4m3!">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger settings-save-btn bg-red">SAVE</button>


                </form>
            </div>

        </div>

    </div>
    </div>
    </div>
    <div class="push"></div>
    </div>
    <!-- service added  end-->

@endsection
