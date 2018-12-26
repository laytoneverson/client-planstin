@extends('layouts.portal-member')

@section('content')

    <!-- body content -->
    <h3 class="side-bra-smi-h3 disply-inline">Submit an event</h3>
    <p id="submitEventp">If you had recent changes in your life such as birth of a child, death of a dependent etc. then you are eligible for a plan change. Please submit the event change below and we will analyze your request.</p>
    <form method="" action="" class="event-form-page">
        <div class="form-group">
            <label class="login-input-label2 text-black" for="submitEventDate">Event Date</label>
            <input type="text" class="form-control input-sm" id="submitEventDate" placeholder="">
            <label class="login-input-label2 text-black" for="submitEventDes">Please describe the event</label>
            <textarea class="form-control" id="submitEventDes"></textarea>
            <button type="submit" class="btn btn-primary bg-red event-sub">Submit</button>
        </div>
    </form>  

@endsection
