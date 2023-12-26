@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-vehicle')}}</h3>
        </x-slot>

        <form action="{{route("vehicles.store")}}" method="post"
              enctype="multipart/form-data"
        >
            @csrf
            <div class="row">
                <div class="col-12">
                    @include('partials.error-alert',['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="vehicle_no"
                        label="vehicle-number"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="plate_no"
                        label="plate-no"
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
                    <x-form.select
                        name="vehicle_type_id"
                        label="type"
                        :options="$types"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="make"
                        label="make"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="model"
                        label="model"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="color"
                        label="color"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="year"
                        label="year"
                    />
                </div>

                <div class="col-12 my-2">
                    <h3>{{__('vehicle-insurance')}}</h3>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="company_name"
                        label="company-name"
                    />
                </div>

                <div class="col-12">
                    <h3>Contact</h3>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="office"
                        label="office"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="mobile"
                        label="mobile"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_phone"
                        label="emergency-contact"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="email"
                        label="email"
                    />
                </div>

                @include('partials.contact')

                @include('partials.address')

                <div class="col-sm-4">
                    <x-form.input
                        name="policy_no"
                        label="policy-number"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="expire_date"
                        label="expire-date"
                        type="date"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="expired"
                        label="expired"
                        options="[0=>No, 1=>Yes]"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="document"
                        label="Document"
                        type="file"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>
        </form>

    </x-content>
@endsection
