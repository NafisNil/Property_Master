@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Add Log
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('ActivityLog.index') }}">Log</a></li>
        <li class="breadcrumb-item active" aria-current="page">Log</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div id="exTab2" class="container">
                    <div class="row">
                        <div class="col-sm-2 bg-info" aria-orientation="vertical">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="#appointment" data-toggle="tab">Appointment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#deliveries" data-toggle="tab">Deliveries</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#emergencies" data-toggle="tab">Emergencies</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#phones_emails_and_faxes" data-toggle="tab">Phones,emails and Faxes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#incidents" data-toggle="tab">Incidents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#inspections" data-toggle="tab">Inspections</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#lost_and_found" data-toggle="tab">Lost and Found</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#mails_and_courier" data-toggle="tab">Mails & Courier</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#meeting" data-toggle="tab">Meeting</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#orders" data-toggle="tab">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#receiving" data-toggle="tab">Receiving</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#repair_and_maintance" data-toggle="tab">Repair and Maintance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#shipping" data-toggle="tab">Shipping</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#staff_clock_in_out" data-toggle="tab">Staff Clock in/out</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#visitors" data-toggle="tab">Visitors</a>
                                </li>
                            </ul> 
                        </div>

                        <div class="col-sm-10">
                            <div class="tab-content ">
                                @include('activity_log.appointment')
                                @include('activity_log.deliveries')
                                @include('activity_log.emergencies')
                                @include('activity_log.phones_emails_and_faxes')
                                @include('activity_log.incidents')
                                @include('activity_log.inspections')
                                @include('activity_log.lost_and_found')
                                @include('activity_log.mails_and_courier')
                                @include('activity_log.meeting')
                                @include('activity_log.orders')
                                @include('activity_log.receiving')
                                @include('activity_log.repair_and_maintance')
                                @include('activity_log.shipping')
                                @include('activity_log.staff_clock_in_out')
                                @include('activity_log.visitors')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/datatable_custom.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/js/countrystatecity.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>

<script type="text/javascript">
$("#school-office-phone").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#school-office-mobile").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#school-office-emargency").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});

$("#edumin-office-phone").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#edumin-office-mobile").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#edumin-office-emargency").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
$("#acadep_phone_office").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});

$("#edudep_phone_office").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});

$(document).ready(function () {
    $("#add-more").click(function (e) {
        // Create clone of <div class='input-form'>
        var newel = $('.school_level_field').clone();

        // Add after last <div class='input-form'>
        $(newel).insertAfter(".school_level_field:last");

    });

});
</script>
@endpush
