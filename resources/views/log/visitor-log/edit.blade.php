@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Add Visitor Log</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('visitor-logs.update', $visitorLog->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <x-form.input
                            name="date"
                            label="Date"
                            type="datetime-local"
                            value="{{$visitorLog->date}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="visitor_name"
                            label="Visitor's Name"
                            value="{{$visitorLog->visitor_name}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="purpose"
                            label="Reason for Visit"
                            value="{{$visitorLog->purpose}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="meeting_with"
                            label="Meeting With"
                            value="{{$visitorLog->meeting_with}}"
                        />
                    </div>


                    <div class="col-sm-4">
                        <x-form.input
                            name="department"
                            label="Department"
                            value="{{$visitorLog->department}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="time_in"
                            label="Time In"
                            type="datetime-local"
                            value="{{$visitorLog->time_in}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="time_out"
                            label="Time Out"
                            type="datetime-local"
                            value="{{$visitorLog->time_out}}"
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
