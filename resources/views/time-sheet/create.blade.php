@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Add Time Sheet
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
                    <form action="{{ route('time-sheets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-4">
                                <x-form.input
                                    name="sheet_no"
                                    value="{{time()}}"
                                    label="Time Sheet No."
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
                                    name="employee_name"
                                    label="Employee Name*"
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
                                <x-form.input
                                    name="start_period"
                                    label="Start Period"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="end_period"
                                    label="End Period"
                                />

                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="pay_period"
                                    label="Pay Period"
                                    />
                            </div>

                            <div class="col-12">
                                <table class="table table-bordered" id="time_sheet_table">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @include('time-sheet.item-row')
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button class="btn btn-primary btn-icon" id="add_more_btn" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>

                        <div class="row mt-4">
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

            $(document).on('click', '#add_more_btn', function () {
                let lll = $('#time_sheet_table tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;
                let prefix = "items[" + index + "]";
                let cloned = $(lll).clone().find('input, select')
                    .each(function (ind, el) {
                        this.name = this.name.replace(/items\[\d+]/, prefix);
                        if(this.name === 'index'){
                            this.value = index;
                        }else {
                            this.value = '';
                        }
                    }).end();

                $('#time_sheet_table').append(cloned)
            })


        });
    </script>
@endpush
