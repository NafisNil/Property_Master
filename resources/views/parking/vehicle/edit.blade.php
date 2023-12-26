@extends('layouts.master')

@section('page_title')
    {{__('update-vehicle')}}
@endsection

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-vehicle')}}</h3>
        </x-slot>

        <form action="{{route("vehicles.update", $vehicle->id)}}" method="post"
              enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    @include('partials.error-alert',['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="vehicle_no"
                        label="vehicle-number"
                        value="{{$vehicle->vehicle_no}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="plate_no"
                        label="plate-no"
                        value="{{$vehicle->plate_no}}"
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
                        value="{{$vehicle->vehicle_type_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="make"
                        label="make"
                        value="{{$vehicle->make}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="model"
                        label="model"
                        value="{{$vehicle->model}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="color"
                        label="color"
                        value="{{$vehicle->color}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="year"
                        label="year"
                        value="{{$vehicle->year}}"
                    />
                </div>

                <div class="col-12 my-2">
                    <h3>{{__('vehicle-insurance')}}</h3>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="company_name"
                        label="company-name"
                        value="{{$vehicle->insurance->company_name ?? ''}}"
                    />
                </div>

                <div class="col-12">
                    <h3>Contact</h3>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="office"
                        label="office"
                        value="{{$vehicle->insurance->contact->office ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="mobile"
                        label="mobile"
                        value="{{$vehicle->insurance->contact->mobile ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="emergency_phone"
                        label="emergency-contact"
                        value="{{$vehicle->insurance->contact->emergency_phone ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="email"
                        label="email"
                        value="{{$vehicle->insurance->contact->email ?? ''}}"
                    />
                </div>

                <div class="col-12 my-2">
                    <h3>Address</h3>
                </div>

                @include('partials.address', ['address' => $vehicle->insurance->address ?? ''])

                <div class="col-sm-4">
                    <x-form.input
                        name="policy_no"
                        label="policy-number"
                        value="{{$vehicle->insurance->policy_no ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="expire_date"
                        label="expire-date"
                        type="date"
                        value="{{$vehicle->inurance->expire_date ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="expired"
                        label="expired"
                        options="[0=>No, 1=>Yes]"
                        value="{{$vehicle->inurance->expired ?? ''}}"
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
