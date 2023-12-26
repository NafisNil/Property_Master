@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-parking-log')}}</h3>
        </x-slot>
        <form action="{{route('parking-logs.update', $parkingLog->id)}}"
              method="post"
        >
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-12">
                    @include('partials.error-alert', ['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date" label="Date"
                        type="datetime-local"
                        value="{{$parkingLog->date}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="stall_no" label="Stall No"
                                  value="{{$parkingLog->stall_no}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="start_time" label="Start Time"
                                  type="datetime-local"
                                  value="{{$parkingLog->start_time}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="end_time" label="End Time"
                                  type="datetime-local"
                                  value="{{$parkingLog->end_time}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="make" label="Make"
                                  value="{{$parkingLog->make}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="model" label="Model"
                                  value="{{$parkingLog->model}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="color" label="Color"
                                  value="{{$parkingLog->model}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="plate_no" label="Plate No"
                                  value="{{$parkingLog->plate_no}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="driver_name" label="Driver Name"
                                  value="{{$parkingLog->driver_name}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="phone" label="Phone"
                                  value="{{$parkingLog->phone}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="email" label="Email"
                                  value="{{$parkingLog->email}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="purpose_of_visit" label="Purpose of Visit"
                                  value="{{$parkingLog->purpose_of_visit}}"
                    />
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">{{__('update')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
