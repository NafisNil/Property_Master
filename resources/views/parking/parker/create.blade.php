@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-parker')}}</h3>
        </x-slot>
        <x-form action="{{route('parkers.store')}}" method="post"
        >
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
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
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="license_no"
                        label="driving-license-no"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="expiry_date"
                        label="expiry-date"
                        type="date"
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

                @include('partials.contact', ['prefix' => 'contact'])

                <div class="col-12">
                    <h3>Address</h3>
                </div>
                @include('partials.address')

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>

        </x-form>
    </x-content>
@endsection
