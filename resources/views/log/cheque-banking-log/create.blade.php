@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Add Mail Log</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('cheque-banking-logs.store')}}">
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
                            name="tracking_no"
                            label="Tracking No."
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.select
                            name="type"
                            label="Select Type"
                            :options="$types"

                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="sender"
                            label="Sender"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="recipient"
                            label="Recipient"
                        />
                    </div>


                    <div class="col-sm-4">
                        <x-form.input
                            name="employee_name"
                            label="Employee Name"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="description"
                            label="Description"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="date_received"
                            label="Date Received"
                            type="datetime-local"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="carrier_company"
                            label="Carrier Company"
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
