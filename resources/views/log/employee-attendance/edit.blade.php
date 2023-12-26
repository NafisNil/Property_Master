@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Add Employee Attendance</h4>
        </x-slot>

        <form method="post" action="{{ route('employee-attendance-logs.update', $employeeAttendance->id)}}">

            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input name="date"
                                  label="Date"
                                  value="{{$employeeAttendance->date}}"
                    >
                    </x-form.input>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="employee_name"
                        label="Employee Name"
                        value="{{$employeeAttendance->employee_name}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="time_in"
                        type="time"
                        label="Time IN"
                        value="{{$employeeAttendance->time_in}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="time_out"
                        type="time"
                        label="Out time"
                        value="{{$employeeAttendance->time_out}}"
                    />
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

            </div>
        </form>

    </x-content>
@endsection
