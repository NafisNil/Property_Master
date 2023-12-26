@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Add Employee Attendance</h4>
        </x-slot>

        <form method="post" action="{{ route('employee-attendance-logs.store')}}">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input name="date"
                                  label="Date"
                                  type="datetime-local"
                    >
                    </x-form.input>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="employee_name"
                        label="Employee Name"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="time_in"
                        type="time"
                        label="Time IN"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="time_out"
                        type="time"
                        label="Out time"
                    />
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

            </div>
        </form>

    </x-content>
@endsection
