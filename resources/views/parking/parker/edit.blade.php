@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h3>{{__('update-parker')}}</h3>
        </x-slot>
        <x-form action="{{route('parkers.update', $parker->id)}}" method="put"
        >
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                        value="{{$parker->name}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="image"
                        label="Photo"
                        type="file"
                        accept="image/jpeg, image/png, image/jpg"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="parker_type_id"
                        label="Parker Type"
                        :options="$parkerTypes"
                        value="{{$parker->parker_type_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="license_no"
                        label="driving-license-no"
                        value="{{$parker->license_no}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="expiry_date"
                        label="expiry-date"
                        type="date"
                        value="{{\Carbon\Carbon::parse($parker->expiry_date)->format('Y-m-d')}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="document"
                        label="document"
                        type="file"
                        accept="application/pdf, image/png, image/jpg, image/jpeg"
                    />
                </div>


                <div class="col-12">
                    <h3>Contact</h3>
                </div>

                @include('partials.contact', ['prefix' => 'contact', 'contact' => $parker->contact])

                <div class="col-12">
                    <h3>Address</h3>
                </div>
                @include('partials.address', ['address' => $parker->address])

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('update')}}</button>
                </div>

            </div>

        </x-form>
    </x-content>
@endsection
