@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Add Mail Log</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('mail-logs.update', $mailLog->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <x-form.input
                            name="date"
                            label="Date"
                            type="datetime-local"
                            value="{{$mailLog->date}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="tracking_no"
                            label="Tracking No."
                            value="{{$mailLog->tracking_no}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="sender"
                            label="Sender"
                            value="{{$mailLog->sender}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="recipient"
                            label="Recipient"
                            value="{{$mailLog->recipient}}"
                        />
                    </div>


                    <div class="col-sm-4">
                        <x-form.input
                            name="employee_name"
                            label="Employee Name"
                            value="{{$mailLog->employee_name}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="description"
                            label="Description"
                            value={{$mailLog->description}}
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="date_received"
                            label="Date Received"
                            type="datetime-local"
                            value="{{$mailLog->date_received}}"
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
