@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Update Account Holder
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
                    <h6 class="card-title text-capitalize">Update Form</h6>

                    {!! Form::open(['url' => route('account-holders.update', $accountHolder->id), 'enctype' => 'multipart/form-data', 'method' => 'PUT']) !!}

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("first_name", 'First Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('first_name', $accountHolder->first_name, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("middle_name", 'Middle Name', ['class' => 'control-label']) !!}
                                {!! Form::text('middle_name', $accountHolder->middle_name, ['class' => 'form-control', 'placeholder' => 'Middle Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("last_name", 'Last Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('last_name', $accountHolder->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
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
                                {!! Form::label("education", 'Education*', ['class' => 'control-label']) !!}
                                {!! Form::text('education', $accountHolder->education, ['class' => 'form-control', 'placeholder' => 'Education']) !!}
                            </div>
                        </div>

                    </div>

                    <h4 class="my-2">Address</h4>

                    <div class="row parent-country-selection">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("country", 'Country*', ['class' => 'control-label']) !!}
                                {!! Form::select('country', [], $accountHolder->address->country ?? '', ['class' => 'form-control countries', 'id' => "country", 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("state", 'State*', ['class' => 'control-label']) !!}
                                {!! Form::select('state', [], $accountHolder->address->state ?? '', ['class' => 'form-control states', 'placeholder' => 'Select State']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("city", 'City*', ['class' => 'control-label']) !!}
                                {!! Form::select('city', [], $accountHolder->address->city ?? '', ['class' => 'form-control cities', 'placeholder' => 'City']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("zip", 'Zip*', ['class' => 'control-label']) !!}
                                {!! Form::text('zip', $accountHolder->address->zip ?? '', ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("street", 'Street No*', ['class' => 'control-label']) !!}
                                {!! Form::text('street', $accountHolder->address->street ?? '', ['class' => 'form-control', 'placeholder' => 'Street No.']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("address", 'Address', ['class' => 'control-label']) !!}
                                {!! Form::text('address', $accountHolder->address->name ?? '', ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                            </div>
                        </div>

                    </div>

                    <h4 class="my-2">Contact</h4>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('phone', 'Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('phone', $accountHolder->contact->phone ?? '', ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("office_phone", 'Office Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('office_phone', $accountHolder->contact->office ?? '', ['class' => 'form-control', 'placeholder' => 'Office Phone']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("mobile", 'Mobile*', ['class' => 'control-label']) !!}
                                {!! Form::text('mobile', $accountHolder->contact->mobile ?? '', ['class' => 'form-control', 'placeholder' => 'Mobile']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("email", 'Email*', ['class' => 'control-label']) !!}
                                {!! Form::text('email', $accountHolder->contact->email ?? '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('fax', 'Fax*', ['class' => 'control-label']) !!}
                                {!! Form::text('fax', $accountHolder->contact->fax ?? '', ['class' => 'form-control', 'placeholder' => 'Fax']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("website", 'Website*', ['class' => 'control-label']) !!}
                                {!! Form::text('website', $accountHolder->contact->website ?? '', ['class' => 'form-control', 'placeholder' => 'Website']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <input type="hidden" name="type" value="{{request()->query('type')}}">
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
