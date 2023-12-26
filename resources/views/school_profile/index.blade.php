@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('school-profile')}}
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('schoolProfile.index') }}">{{__('school-profile')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('school-profile')}}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div id="exTab2" class="container">
                    <ul class="nav nav-tabs">
                        <li class="active nav-item">
                            <a class="nav-link active" href="#sprofile" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#m-education" data-toggle="tab">Ministry of Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#SchoolLevel" data-toggle="tab">School Level</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#departments" data-toggle="tab">Departments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faculty_rooms" data-toggle="tab">Facility /Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#markstructure" data-toggle="tab">Mark Structure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#3" data-toggle="tab">Students Category</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#3" data-toggle="tab">Classrooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#3" data-toggle="tab">Academic</a>
                        </li>
                    </ul>

                    @include('partials.error-alert',['errors' => $errors])

                    <div class="tab-content ">
                        @include('school_profile.profile')
                        @include('school_profile.ministry_of_ducation')
                        @include('school_profile.school_level')
                        @include('school_profile.department')
                        @include('school_profile.facility_rooms')
                        @include('school_profile.mark_structure')
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
