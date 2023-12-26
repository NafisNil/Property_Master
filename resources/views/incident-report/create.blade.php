@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Add Service Provider
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Assignment.index') }}">Assignment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignment</li>
        </ol>
    </nav>

    @include('partials.error-alert',['errors' => $errors])

    <div class="row">

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-capitalize">Create Form</h6>
                    <form action="{{ route('incident-reports.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-4">
                                <x-form.input
                                    name="incident_no"
                                    value="{{time()}}"
                                    label="Incident No."
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="date"
                                    label="Date"
                                    type="datetime-local"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="noticed_by"
                                    label="Noticed By"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="department_id"
                                    :options="$departments"
                                    label="Select Department"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="report_to"
                                    :options="$stuffs"
                                    label="Report to"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="title"
                                    label="What Happened?"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="incident_location"
                                    label="Where Happened?"
                                />

                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="incident_time"
                                    label="When Happened"
                                    type="datetime-local"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="cause"
                                    label="Incident Cause"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.textarea
                                    name="description"
                                    label="Incident Description"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.textarea
                                    name="people_involved"
                                    label="People involved"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.textarea
                                    name="immediate_actions_taken"
                                    label="Immediate Actions Taken"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.checkbox
                                    name="emergency_called"
                                    label="Is 911 Called?"
                                />
                            </div>


                            <div class="col-sm-4">
                                <x-form.input
                                    name="police_file_no"
                                    label="Police File No."
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="fire_department_file_no"
                                    label="FireDepartment File No."
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="injured"
                                    label="Who Injured"
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="created_by">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="updated_by">
                                <button type="submit" class="btn btn-primary submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $(document).on('click', '.add-more-btn', function () {
                let lll = $('#expense-table tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;
                let prefix = "reminders[" + index + "]";
                let cloned = $(lll).clone().find('input, select')
                    .each(function (ind, el) {
                        this.name = this.name.replace(/reminders\[\d+]/, prefix);
                        /*if(this.)*/
                        this.value = '';
                    }).end();

                $('#expense-table').append(cloned)
            })


        });
    </script>
@endpush
