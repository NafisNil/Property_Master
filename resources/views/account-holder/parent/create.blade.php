@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Add Parent
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('account-holders.index', ['type' => request()->query('type')]) }}">Account
                    Holders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account Holders</li>
        </ol>
    </nav>

    <div class="row">

        @include('partials.error-alert', ['errors' => $errors])

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-capitalize">New Parent</h6>

                    {!! Form::open(['url' => route('account-holders.store'), 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-12">
                            <h3 class="text-center">Personal Information</h3>
                        </div>

                        <hr/>

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
                                {!! Form::label("email", 'Email*', ['class' => 'control-label']) !!}
                                {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("gender", 'Select Gender*', ['class' => 'control-label']) !!}
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], '', ['class' => 'form-control', 'placeholder' => 'Select Gender']) !!}
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('image', 'Image', ['class' => 'control-label']) !!}
                                {!! Form::file('image', ['class' => 'form-control', 'placeholder' => 'Upload Image', 'accept' => 'image/jpeg, image/png']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("education", 'Education*', ['class' => 'control-label']) !!}
                                {!! Form::text('education', '', ['class' => 'form-control', 'placeholder' => 'Education']) !!}
                            </div>
                        </div>

                    </div>

                    <h3 class="my-2 text-center">Address</h3>

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

                    <h3 class="my-2 text-center">Contact</h3>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("office_phone", 'Office Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('office_phone', '', ['class' => 'form-control', 'placeholder' => 'Office Phone']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("mobile", 'Mobile*', ['class' => 'control-label']) !!}
                                {!! Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => 'Mobile']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('fax', 'Fax*', ['class' => 'control-label']) !!}
                                {!! Form::text('fax', '', ['class' => 'form-control', 'placeholder' => 'Fax']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("website", 'Website*', ['class' => 'control-label']) !!}
                                {!! Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'Website']) !!}
                            </div>
                        </div>

                    </div>

                    <h3 class="my-2 text-center">Emergency Contact</h3>

                    <div class="row">
                        <div class="col-sm-4">
                            <x-form.input name="emergency_name"
                                          label="Person Name"
                            />
                        </div>
                        <div class="col-sm-4">
                            <x-form.input
                                name="emergency_relation"
                                label="Relation*"
                            />
                        </div>
                        <div class="col-sm-4">
                            <x-form.input
                                name="emergency_image"
                                label="Person Image"
                                type="file"
                                accept="image/jpeg, image/png"
                            />
                        </div>

                        <div class="col-sm-4">
                            <x-form.input
                                name="emergency_phone"
                                label="Phone*"
                            />
                        </div>

                        <div class="col-sm-4">
                            <x-form.input
                                name="emergency_email"
                                label="Email*"
                            />
                        </div>

                        <div class="col-sm-4">
                            <x-form.input
                                name="emergency_address"
                                label="Address*"
                            />
                        </div>

                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <input type="hidden" name="type" value="{{$type}}">
                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/js/countrystatecity.js')}}"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
@endpush
