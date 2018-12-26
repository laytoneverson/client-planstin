@extends('layouts.portal-broker')

@section('content')
 
<h2 class="">Signed Documents</h2>

<div class="row mt-4 documents">
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement 1</p>
        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement 1</p>
        </div> 
    </div>
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement For a reason To Say</p>
        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement 1</p>
        </div>
    </div>
</div>
<br>

<h2 class="">Documents To Sign</h2>
<div class="row mt-4 documents">
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement 2</p>
        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement 3</p>
        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement 4</p>
        </div>
    </div>
    <div class="col-lg-3 mb-3">
        <div class="">
            <img src="/images/pdf.png" alt="" class="img-fluid w-lg-50">
            <p class="text-red">Statement 5</p>
        </div>
    </div>
</div>

<br> 

<h2 class="">Upload a Document</h2>
<div class="form-group">
    <button class="btn btn-link btn-black"><i class="fa fa-upload"></i> Upload Document</button>
</div>

@endsection
