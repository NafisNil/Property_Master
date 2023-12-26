@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Update Mileage</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('car-mileage-logs.update',$carMileage->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <x-form.input
                            name="date"
                            label="Date"
                            type="datetime-local"
                            value="{{$carMileage->date}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="vehicle_id"
                            label="Vehicle Id"
                            value="{{$carMileage->vehicle_id}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="driver_name"
                            label="Driver Name"
                            value="{{$carMileage->driver_name}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="start_location"
                            label="Start Location"
                            value="{{$carMileage->start_location}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="end_location"
                            label="End Location"
                            value="{{$carMileage->end_location}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="start_time"
                            label="Start Time"
                            type="datetime-local"
                            value="{{$carMileage->start_time}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="end_time"
                            label="End Time"
                            type="datetime-local"
                            value="{{$carMileage->end_time}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="start_mileage"
                            label="Start Mileage"
                            value="{{$carMileage->start_mileage}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="end_mileage"
                            label="End Mileage"
                            value="{{$carMileage->end_mileage}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="purpose"
                            label="Purpose of Trip"
                            value="{{$carMileage->purpose}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="note"
                            label="Note"
                            value="{{$carMileage->note}}"
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
