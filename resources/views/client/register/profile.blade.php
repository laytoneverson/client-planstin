@extends('layouts.public')

@section('content')

    <!-- business body content -->
    <section class="businees-pro-cre">
        <div class="container">
            <h2 class="busi-p-cre-head text-black">Create your business profile</h2>
            <div class="row">

                @formStart($form, ['attr' => ['class' => 'user-data']])

                    <div class="col-md-6">

                        <div class="form-group">
                            @formLabel($form['dba'], 'Business Name', ['label_attr' => ['class' => 'data-input-label text-black']])
                            <span class="input-detail text-gray-3">Name of company, DBA or sole proprietorship.</span>
                            @formWidget($form['dba'])
                        </div>

                        <div class="form-group">
                            @formLabel($form['taxId'], 'Business Tax ID', ['label_attr' => ['class' => 'data-input-label text-black']])
                            <span class="input-detail text-gray-3">Please enter business EIN, Tax ID or sole proprietor social security number.</span>
                            @formWidget($form['taxId'])
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="image-uploader">
                            <img class="up-img up-img-1" src="/images/uplaod-icon.png" alt="">
                            <span class="up-img up-text">Add Profile Picture</span>
                        </div>

                        <div class="clearfix"></div>

                        <!-- upload file -->
                        @formWidget($form['profileImageUpload'], ['attr' => ['class' => 'hiddenUploadInput']])

                        <a href="" id="upload_link">
                            <div class="img-upload">
                                <img class="up-plus" src="/images/up-plus.png" alt="">
                            </div>
                        </a>

                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-12">
                                <label class="data-input-label text-black b-addr" for="exampleInputEmail1">Business Address</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <span class="input-detail text-gray-3">Street Address</span>
                                    @formWidget($form['shippingAddress']['street1'])
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <span class="input-detail text-gray-3">Address Line 2</span>
                                    @formWidget($form['shippingAddress']['street2'])
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <span class="input-detail text-gray-3">City </span>
                                    @formWidget($form['shippingAddress']['city'])
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <span class="input-detail text-gray-3">Province/State* </span>
                                            @formWidget($form['shippingAddress']['state'])
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <span class="input-detail text-gray-3">Postcode/Zip* </span>
                                            @formWidget($form['shippingAddress']['postalCode'])
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    @formLabel(
                                        $form['primaryContact']['firstName'],
                                        'Primary Contact First Name',
                                        ['label_attr' => ['class' => 'data-input-label text-black mgr-b']]
                                    )
                                    @formWidget($form['primaryContact']['firstName'])
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    @formLabel(
                                        $form['primaryContact']['lastName'],
                                        'Primary Contact Last Name',
                                        ['label_attr' => ['class' => 'data-input-label text-black mgr-b']]
                                    )
                                    @formWidget($form['primaryContact']['lastName'])
                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    @formLabel(
                                        $form['primaryContact']['phone'],
                                        'Primary Contact Phone Number',
                                        ['label_attr' => ['class' => 'data-input-label text-black mgr-b']]
                                    )
                                    @formWidget($form['primaryContact']['phone'])
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    @formLabel(
                                        $form['primaryContact']['email'],
                                        'Primary Contact Email Address',
                                        ['label_attr' => ['class' => 'data-input-label text-black mgr-b']]
                                    )
                                    @formWidget($form['primaryContact']['email'])
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-primary btn-submit bg-red text-white btn-regis btn-save">save
                    </button>
                    @formRest($form)
                </form>
            </div>
        </div>
    </section>
    <div class="push"></div>
    <!-- business body content end-->


@endsection
