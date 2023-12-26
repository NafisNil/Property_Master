@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{$userType->name ?? 'Seller'}}
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

                    <h3 class="card-title text-capitalize">New {{$userType->name}}</h3>

                    {!! Form::open(['url' => route('seller.update', $accountHolder->id), 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-sm-4">
                            @include('partials.active-status', ['status' => $accountHolder->status])
                        </div>
                    </div>

                    <hr/>

                    <h4 class="my-2">Company</h4>

                    <div class="row parent-country-selection">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_name", 'Legal Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_name', $accountHolder->corporation->name ?? '', ['class' => 'form-control', 'placeholder' => 'Legal Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_no", 'Business No*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_no', $accountHolder->corporation->business_no ?? '', ['class' => 'form-control', 'placeholder' => 'Business No.']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_office_country", 'Office Country*', ['class' => 'control-label']) !!}
                                {!! Form::select('corporation_office_country', [], $accountHolder->corporation->office_country ?? '', ['class' => 'form-control countries', 'placeholder' => 'Office Country']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_office_state", 'Office State', ['class' => 'control-label']) !!}
                                {!! Form::select('corporation_office_state', [], $accountHolder->corporation->office_state ?? '', ['class' => 'form-control states', 'placeholder' => 'Office State']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("office_city", 'Office City', ['class' => 'control-label']) !!}
                                {!! Form::select('office_city', [], $accountHolder->corporation->office_city  ?? '', ['class' => 'form-control cities', 'placeholder' => 'Office City']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("logo", 'Logo', ['class' => 'control-label']) !!}
                                {!! Form::file('logo', ['class' => 'form-control', 'placeholder' => 'Logo']) !!}
                            </div>
                        </div>

                    </div>

                    <h4 class="my-2">Company Address</h4>

                    <div class="row parent-country-selection">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_country", 'Country*', ['class' => 'control-label']) !!}
                                {!! Form::select('corporation_country', [], $accountHolder->corporation->address->country ?? '', ['class' => 'form-control countries', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_state", 'State*', ['class' => 'control-label']) !!}
                                {!! Form::select('corporation_state', [], $accountHolder->corporation->address->state ?? '', ['class' => 'form-control states', 'placeholder' => 'Select State']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_city", 'City*', ['class' => 'control-label']) !!}
                                {!! Form::select('corporation_city', [], $accountHolder->corporation->address->city ?? '', ['class' => 'form-control cities', 'placeholder' => 'City']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_street", 'Street', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_street', $accountHolder->corporation->address->street ?? '', ['class' => 'form-control', 'placeholder' => 'Street No.']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_zip", 'Zip', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_zip', $accountHolder->corporation->address->zip ?? '', ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_address", 'Address', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_address', $accountHolder->corporation->address->name ?? '', ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                            </div>
                        </div>
                    </div>

                    <h4 class="my-2">Company Contact</h4>

                    <div class="row state-parent">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('corporation_phone', 'Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_phone', $accountHolder->corporation->contact->phone ?? '', ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_office_phone", 'Office Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_office_phone', $accountHolder->corporation->contact->office ?? '', ['class' => 'form-control', 'placeholder' => 'Office Phone']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_mobile", 'Mobile*', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_mobile', $accountHolder->corporation->contact->mobile ?? '', ['class' => 'form-control', 'placeholder' => 'Mobile']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_email", 'Email*', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_email', $accountHolder->corporation->contact->email ?? '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('corporation_fax', 'Fax*', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_fax', $accountHolder->corporation->contact->fax ?? '', ['class' => 'form-control', 'placeholder' => 'Fax']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("corporation_website", 'Website*', ['class' => 'control-label']) !!}
                                {!! Form::text('corporation_website', $accountHolder->corporation->contact->website ?? '', ['class' => 'form-control', 'placeholder' => 'Website']) !!}
                            </div>
                        </div>

                    </div>

                    <h4>Company Director</h4>

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
                                {!! Form::label("email", 'Email*', ['class' => 'control-label']) !!}
                                {!! Form::text('email', $accountHolder->email, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("gender", 'Select Gender*', ['class' => 'control-label']) !!}
                                {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], $accountHolder->gender, ['class' => 'form-control', 'placeholder' => 'Select Gender']) !!}
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

                    <h3 class="my-2 text-center">Contact</h3>

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


                    <h4 class="my-2">Business License</h4>

                    <div class="row parent-country-selection">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('business_license_no', 'Business License No.*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_license_no', $businessLicense->license_no ?? '', ['class' => 'form-control', 'placeholder' => 'Business License']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('business_issuer_name', 'Issuer Name*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_issuer_name', $businessLicense->issuer_name ?? '', ['class' => 'form-control', 'placeholder' => 'Issuer Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_issuer_country", 'Issuer Country*', ['class' => 'control-label']) !!}
                                {!! Form::select('business_issuer_country', [], $businessLicense->issue_country ?? '', ['class' => 'form-control countries', 'placeholder' => 'Issuer Country']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_issuer_state", 'Issuer State*', ['class' => 'control-label']) !!}
                                {!! Form::select('business_issuer_state', [], $businessLicense->issuer_state ?? '', ['class' => 'form-control states', 'placeholder' => 'Issuer State']) !!}
                            </div>

                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_issuer_city", 'Issuer City*', ['class' => 'control-label']) !!}
                                {!! Form::select('business_issuer_city', [], $businessLicense->issueer_city ?? '', ['class' => 'form-control cities', 'placeholder' => 'Issuer City']) !!}
                            </div>
                        </div>


                    </div>

                    <h4 class="my-2">Business License Address</h4>

                    <div class="row parent-country-selection">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_country", 'Country*', ['class' => 'control-label']) !!}
                                {!! Form::select('business_country', [], $businessLicense->address->country ?? '' , ['class' => 'form-control countries', 'id' => "country", 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business-state", 'State*', ['class' => 'control-label']) !!}
                                {!! Form::select('business_state', [], $businessLicense->address->state ?? '', ['class' => 'form-control states', 'placeholder' => 'Select State']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_city", 'City*', ['class' => 'control-label']) !!}
                                {!! Form::select('business_city', [], $businessLicense->address->city ?? '', ['class' => 'form-control cities', 'placeholder' => 'City']) !!}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_street", 'Street', ['class' => 'control-label']) !!}
                                {!! Form::text('business_street', $businessLicense->address->street ?? '', ['class' => 'form-control', 'placeholder' => 'Street No.']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_zip", 'Zip', ['class' => 'control-label']) !!}
                                {!! Form::text('business_zip', $businessLicense->address->zip ?? '', ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_address", 'Address', ['class' => 'control-label']) !!}
                                {!! Form::text('business_address', $businessLicense->address->name ?? '', ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                            </div>
                        </div>

                    </div>

                    <h4 class="my-2">Business License Contact</h4>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('business_phone', 'Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_phone', $businessLicense->contact->phone ?? '', ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            </div>
                            <x-form.input name="person_name"
                                          label="Person Name"
                            />
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_office_phone", 'Office Phone*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_office_phone', $businessLicense->contact->office ?? '', ['class' => 'form-control', 'placeholder' => 'Office Phone']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_mobile", 'Mobile*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_mobile', $businessLicense->contact->mobile ?? '', ['class' => 'form-control', 'placeholder' => 'Mobile']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_email", 'Email*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_email', $businessLicense->contact->email ?? '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('business_fax', 'Fax*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_fax', $businessLicense->contact->fax ?? '', ['class' => 'form-control', 'placeholder' => 'Fax']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label("business_website", 'Website*', ['class' => 'control-label']) !!}
                                {!! Form::text('business_website', $businessLicense->contact->website ?? '', ['class' => 'form-control', 'placeholder' => 'Website']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <x-form.input
                                name="feedback"
                                label="Feedback"
                                value="{{$accountHolder->feedback}}"
                            />

                        </div>

                        <div class="col-sm-4">
                            <x-form.input
                                name="comment"
                                label="comment"
                                value="{{$accountHolder->comment}}"
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
