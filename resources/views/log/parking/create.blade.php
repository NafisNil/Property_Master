@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-parking-log')}}</h3>
        </x-slot>
        <form action="{{route('parking-logs.store')}}"
              method="post"
        >
            @csrf


            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="date" label="Date"
                        type="datetime-local"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="stall_no" label="Stall No"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="start_time" label="Start Time"
                                  type="datetime-local"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="end_time" label="End Time"
                                  type="datetime-local"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="make" label="Make"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="model" label="Model"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="color" label="Color"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="plate_no" label="Plate No"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="driver_name" label="Driver Name"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="phone" label="Phone"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="email" label="Email"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="purpose_of_visit" label="Purpose of Visit"/>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">{{__('submit')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
