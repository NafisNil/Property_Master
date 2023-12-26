@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Add Student
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('account-holders.index') }}">Account
                    Holders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account Holders</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="text-center">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-capitalize">Create Form</h6>

                    {!! Form::open(['url' => route('students.store'), 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("first_name", 'First Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("middle_name", 'Middle Name', ['class' => 'control-label']) !!}
                                {!! Form::text('middle_name', '', ['class' => 'form-control', 'placeholder' => 'Middle Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("last_name", 'Last Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("student_id_no", 'Student Id*', ['class' => 'control-label']) !!}
                                {!! Form::text('student_id_no', '', ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("gender", 'Select Gender*', ['class' => 'control-label']) !!}
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], '', ['class' => 'form-control', 'placeholder' => 'Gender']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("program_id", 'Select Program*', ['class' => 'control-label']) !!}
                                {!! Form::select('program_id', $programs, '', ['class' => 'form-control', 'placeholder' => 'Program']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("year", 'Select Education Year*', ['class' => 'control-label']) !!}
                                {!! Form::select('year', $years, '', ['class' => 'form-control', 'placeholder' => 'Year']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("semester_id", 'Select Semester/Term*', ['class' => 'control-label']) !!}
                                {!! Form::select('semester_id', $semesters, '', ['class' => 'form-control', 'placeholder' => 'Semester']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("email", 'Email *', ['class' => 'control-label']) !!}
                                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Login Email']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
                                {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Upload Image']) !!}
                            </div>
                        </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label("father_id", 'Select Father*', ['class' => 'control-label']) !!}
                                    {!! Form::select('father_id', $fathers, '', ['class' => 'form-control', 'placeholder' => 'Father']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label("mother_id", 'Select Mother*', ['class' => 'control-label']) !!}
                                    {!! Form::select('mother_id', $mothers, '', ['class' => 'form-control', 'placeholder' => 'Mother']) !!}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label("guardian_id", 'Select Guardian*', ['class' => 'control-label']) !!}
                                    {!! Form::select('guardian_id', $parents, '', ['class' => 'form-control', 'placeholder' => 'Guardian']) !!}
                                </div>
                            </div>

                    </div>

                    <h4 class="my-2">Address</h4>

                    <div class="row parent-country-selection">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("country", 'Country*', ['class' => 'control-label']) !!}
                                {!! Form::select('country', [], '', ['class' => 'form-control countries', 'id' => "country", 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("state", 'State*', ['class' => 'control-label']) !!}
                                {!! Form::select('state', [], '', ['class' => 'form-control states', 'placeholder' => 'Select State']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("city", 'City*', ['class' => 'control-label']) !!}
                                {!! Form::select('city', [], '', ['class' => 'form-control cities', 'placeholder' => 'City']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("zip", 'Zip*', ['class' => 'control-label']) !!}
                                {!! Form::text('zip', '', ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("street", 'Street No*', ['class' => 'control-label']) !!}
                                {!! Form::text('street', '', ['class' => 'form-control', 'placeholder' => 'Street No.']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("address", 'Address', ['class' => 'control-label']) !!}
                                {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            {!! Form::label("status", 'Status*', ['class' => 'control-label']) !!}
                            {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                   name="created_by">
                            <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                   name="updated_by">
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/js/countrystatecity.js')}}"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
@endpush
