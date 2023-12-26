@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>Add Key/Fobs Log</h4>
        </x-slot>

        <div>
            <form method="post" action="{{route('key-logs.store')}}">
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
                            name="name"
                            label="Key Name"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="key_no"
                            label="Key No."
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
                            name="returned_time"
                            label="Returned Time"
                            type="datetime-local"
                        />


                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="purpose"
                            label="Purpose"
                        />
                    </div>

                    <div class="col-sm-4">
                        <x-form.input
                            name="stuff_name"
                            label="Stuff Name"
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
