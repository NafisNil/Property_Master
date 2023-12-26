@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Update Cheque And Banking Log</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('cheque-banking-logs.update', $chequeAndBankingLog->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <x-form.input
                            name="date"
                            label="Date"
                            type="datetime-local"
                            value="{{$chequeAndBankingLog->date}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="tracking_no"
                            label="Tracking No."
                            value="{{$chequeAndBankingLog->tracking_no}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.select
                            name="type"
                            label="Select Type"
                            :options="$types"
                            value="{{$chequeAndBankingLog->type}}"

                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="sender"
                            label="Sender"
                            value="{{$chequeAndBankingLog->sender}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="recipient"
                            label="Recipient"
                            value="{{$chequeAndBankingLog->recipient}}"
                        />
                    </div>


                    <div class="col-sm-4">
                        <x-form.input
                            name="employee_name"
                            label="Employee Name"
                            value="{{$chequeAndBankingLog->employee_name}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="description"
                            label="Description"
                            value="{{$chequeAndBankingLog->description}}"
                        />
                    </div>
                    <div class="col-sm-4">
                        <x-form.input
                            name="date_received"
                            label="Date Received"
                            type="datetime-local"
                            value="{{$chequeAndBankingLog->date_received}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="carrier_company"
                            label="Carrier Company"
                            value="{{$chequeAndBankingLog->carrier_company}}"
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
