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
                    <form action="{{ route('job-orders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-4">
                                <x-form.input
                                    name="job_order_no"
                                    value="{{time()}}"
                                    label="Job Order No."
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="requested_date"
                                    label="Requested Date"
                                    type="datetime-local"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="requested_by"
                                    label="Requested By"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="department_id"
                                    label="Department"
                                    :options="$departments"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="status"
                                    label="Current Status"
                                    :options="$statuses"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="phone_number"
                                    label="Phone Number"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="service_type"
                                    label="Service Type"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="service_location"
                                    label="Service Location"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="description"
                                    label="Description"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select name="is_first"
                                               label="Is it the first job order for this asset with same problem ?"
                                               :options="$confirmations"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="priority_level"
                                    label="Priority Level"
                                    :options="$priorityLevels"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="other_information"
                                    label="Other Information"
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
