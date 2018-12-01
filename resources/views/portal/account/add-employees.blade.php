@extends('includes.body-admin')

@section('content')

    @include('includes.sidebar')
    <!-- body content -->
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <!-- Your Benefits< -->
                <h3 class="side-bra-smi-h3 disply-inline">Add your employees</h3>
                <p class="service-para add-m-txt">Once added, your employees will receive an email with a link to create their account and apply for the benefits.</p>

                <div class="row">
                    <form action="" class="user-data add-user">
                        <div class="col-md-6">
                            <ul class="add-member-list">
                                <li>
                                    <div class="form-group">
                                        <label class="data-input-label text-black" for="exampleInputEmail1">Employee's name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="data-input-label text-black" for="exampleInputEmail1">Employee's email address</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label class="data-input-label text-black" for="exampleInputEmail1">Employee's role</label>
                                        <select name="" id="" class="form-control" >
                                            <option value="">Select Role</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>

                            <button class="add-more-btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i>Add Employee</button>


                        </div>
                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-primary btn-done mgr-r">DONE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- body content end -->

    </div>
    </div>
    <div class="push"></div>
    </div>
    <!-- service added  end-->


@endsection
