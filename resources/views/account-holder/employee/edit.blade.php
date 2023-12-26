@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('update-'.$userType->slug ?? '')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('account-holders.update', $accountHolder->id) }}">Account
                    Holders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account Holders</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3 class="text-capitalize">{{__('update-'. $userType->slug ?? '')}}</h3>
        </x-slot>

        @include('partials.error-alert', ['errors' => $errors])

        <x-form action="{{route('account-holders.update', $accountHolder->id)}}"
                files="true" method="PUT">

            {!! Form::open(['url' => route('account-holders.update', $accountHolder->id), 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}

            <div class="row">

                <div class="col-sm-4">
                    @include('partials.active-status', ['status' => $accountHolder->status])
                </div>

                <div class="col-12">
                    <h3 class="text-center">{{__('personal-information')}}</h3>
                </div>

                <hr/>

                <div class="col-sm-4">
                    <x-form.input
                        name="first_name"
                        label="first-name"
                        required="true"
                        value="{{$accountHolder->first_name}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="middle_name"
                        label="middle-name"
                        value="{{$accountHolder->middle_name}}"
                    />

                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="last_name"
                        label="last-name"
                        required="true"
                        value="{{$accountHolder->last_name}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="email"
                        label="Email"
                        required="true"
                        value="{{$accountHolder->email}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="gender"
                        label="Gender"
                        options="[male=>Male, female=>Female, other=>Other]"
                        required="true"
                        value="{{$accountHolder->gender}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="image"
                        label="image"
                        type="file"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="education"
                        label="Education"
                        value="{{$accountHolder->education}}"
                    />
                </div>


                <div class="col-sm-4">
                    <x-form.input
                        name="department"
                        label="department"
                        value="{{$accountHolder->department}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="designation"
                        label="position"
                        value="{{$accountHolder->designation}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="dob"
                        label="date-of-birth"
                        type="date"
                        value="{{$accountHolder->dob}}"
                        required="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="hire_date"
                        label="hire-date"
                        type="date"
                        value="{{$accountHolder->hire_date}}"
                        required="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="last_credit_check"
                        label="last-credit-check"
                        type="date"
                        value="{{$accountHolder->last_credit_check}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="last_criminal_bg_check"
                        label="last-criminal-background-check"
                        type="date"
                        value="{{$accountHolder->last_criminal_bg_check}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="last_drug_check"
                        label="last-drug-check"
                        type="date"
                        value="{{$accountHolder->last_drug_check}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="termination_date"
                        label="termination-date"
                        type="date"
                        value="{{$accountHolder->termination_date}}"
                    />
                </div>

            </div>

            <h3 class="my-2 text-center">{{__('address')}}</h3>

            <div class="row parent-country-selection">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label("country", __('country'), ['class' => 'control-label']) !!}
                        {!! Form::select('country', [], $accountHolder->add->country ?? '', ['class' => 'form-control countries', 'id' => "country", 'placeholder' => 'First Name']) !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label("state", __('state'), ['class' => 'control-label']) !!}
                        {!! Form::select('state', [], '', ['class' => 'form-control states', 'placeholder' => 'Select State']) !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label("city", __('city'), ['class' => 'control-label']) !!}
                        {!! Form::select('city', [], '', ['class' => 'form-control cities', 'placeholder' => 'City']) !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label("zip", __('zip-code'), ['class' => 'control-label']) !!}
                        {!! Form::text('zip', '', ['class' => 'form-control', 'placeholder' => 'Zip']) !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label("street", __('street-no'), ['class' => 'control-label']) !!}
                        {!! Form::text('street', '', ['class' => 'form-control', 'placeholder' => 'Street No.']) !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label("address", __('address'), ['class' => 'control-label']) !!}
                        {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                    </div>
                </div>

            </div>

            <h3 class="my-2 text-center">{{__('contact')}}</h3>

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="phone"
                        label="Phone"
                        value="{{$accountHolder->contact->phone}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="office_phone"
                        label="Office Phone"
                        value="{{$accountHolder->contact->office_phone}}"
                    />

                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="mobile"
                        label="Mobile"
                        value="{{$accountHolder->contact->mobile}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="fax"
                        label="fax"
                        value="{{$accountHolder->contact->fax}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="website"
                        label="Website"
                        value="{{$accountHolder->contact->website}}"
                    />
                </div>

            </div>

            <h3 class="my-2 text-center">{{__('emergency-contact')}}</h3>

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_name"
                        label="name"
                        value="{{$accountHolder->emergencyContact->name ?? ''}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_relation"
                        label="relation"
                        value="{{$accountHolder->emergencyContact->relation ?? ''}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_image"
                        label="image"
                        type="file"
                        accept="image/jpeg, image/png"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_phone"
                        label="phone"
                        value="{{$accountHolder->emergencyContact->phone ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_email"
                        label="email"
                        value="{{$accountHolder->emergencyContact->email ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_address"
                        label="address"
                        value="{{$accountHolder->emergencyContact->address ?? ''}}"
                    />
                </div>

            </div>

            <h3 class="my-2 text-center">{{__('demographic-information')}}</h3>

            <div class="row">

                <div class="col-sm-4">
                    <x-form.input
                        name="nationality"
                        label="nationality"
                        value="{{$accountHolder->nationality}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="born_in_country"
                        label="born-in-country"
                        value="{{$accountHolder->born_in_country}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="languages_spoken"
                        label="languages-spoken"
                        value="{{$accountHolder->languages_spoken}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="citizenship_status"
                        label="citizenship-status"
                        value="{{$accountHolder->citizenship_status}}"
                    />
                </div>

            </div>

            <h3 class="my-2">{{__('professional-background')}}</h3>

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="education"
                        label="educational-qualifications"
                        value="{{$accountHolder->education}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="teaching_experience"
                        label="teaching-experience"
                        value="{{$accountHolder->teaching_experience}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="certification_and_training"
                        label="certification-and-training"
                        value="{{$accountHolder->certification_and_training}}"
                    />
                </div>
            </div>

            <div class="row">

                <div class="col-sm-4">
                    <x-form.select
                        name="case_manager_id"
                        label="case-manager"
                        :options="$caseManagers"
                        value="{{$accountHolder->case_manager_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.textarea
                        name="awards_and_achievements"
                        label="awards-and-achievements"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="parking_stall_no"
                        label="parking-stall"
                    />
                </div>

            </div>

            <div class="col-12 my-3">
                <h4>{{__('car-info')}}</h4>
            </div>

            <div class="row">


                <div class="col-sm-4">
                    <x-form.input
                        name="car_name"
                        label="car-name"
                        value="{{$accountHolder->car->name ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="car_model"
                        label="car-model"
                        value="{{$accountHolder->car->model ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="car_color"
                        label="car-color"
                        value="{{$accountHolder->car->color ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="car_plate_no"
                        label="car-plate-no"
                        value="{{$accountHolder->car->plate_no ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="car_policy_no"
                        label="car-policy-no"
                        value="{{$accountHolder->car->policy_no ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="car_expiry_date"
                        label="car-expiry-date"
                        type="date"
                        value="{{$accountHolder->car->expiry_date ?? ''}}"
                    />
                </div>
            </div>

            <div class="row">


                <div class="col-sm">
                    <x-form.input
                        name="locker_no"
                        label="locker-no"
                        value="{{$accountHolder->locker_no ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="volunteer_activities"
                        label="volunteer-activities"
                        value="{{$accountHolder->volunteer_activities}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.textarea
                        name="bike_info"
                        label="bike-information"
                        value="{{$accountHolder->bike_info}}"
                    />

                </div>

                <div class="col-sm-4">
                    <x-form.textarea
                        name="feedback"
                        label="feedback"
                        value="{{$accountHolder->feedback}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.textarea
                        name="comment"
                        label="comment"
                        value="{{$accountHolder->comment}}"
                    />
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <input type="hidden" name="type" value="{{$type}}">
                <button type="submit" class="btn btn-primary submit">{{__('update')}}</button>
            </div>

        </x-form>

    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/js/countrystatecity.js')}}"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
@endpush
