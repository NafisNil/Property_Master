@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Add Visitor Log</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('visitor-logs.store')}}">
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
                            name="visitor_name"
                            label="Visitor's Name"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="purpose"
                            label="Reason for Visit"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="meeting_with"
                            label="Meeting With"
                        />
                    </div>


                    <div class="col-sm-4">
                        <x-form.input
                            name="department"
                            label="Department"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="time_in"
                            label="Time In"
                            type="datetime-local"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="time_out"
                            label="Time Out"
                            type="datetime-local"
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
