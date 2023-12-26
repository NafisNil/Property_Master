@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Car Mileage</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('car-mileage-logs.store')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <x-form.input
                            name="date"
                            label="Date"
                            type="datetime-local"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="vehicle_id"
                            label="Vehicle Id"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="driver_name"
                            label="Driver Name"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="start_location"
                            label="Start Location"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="end_location"
                            label="End Location"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="start_time"
                            label="Start Time"
                            type="datetime-local"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="end_time"
                            label="End Time"
                            type="datetime-local"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="start_mileage"
                            label="Start Mileage"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="end_mileage"
                            label="End Mileage"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="purpose"
                            label="Purpose of Trip"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="note"
                            label="Note"
                        />
                    </div>
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </x-content>

@endsection
