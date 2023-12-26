@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__("add-daily-report")}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('DailyReport.index') }}">Daily Report</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daily Report</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('add-daily-report')}}</h3>
        </x-slot>

        <div class="row">
            <div class="col-12">
                @include('partials.error-alert',['errors' => $errors])
            </div>
        </div>

        <x-form action="{{ route('DailyReport.store') }}" class="validate-form"
        >
            @csrf
            <div class="row">

{{--                <div class="col-sm-4">
                    <x-form.input
                        name="report_no"
                        label="report-no"
                        value="{{time()}}"
                    />
                </div>--}}

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="department_id"
                        label="department"
                        :options="$departments"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-12 my-2">
                    <h4>Reporting Time</h4>
                </div>

                <div class="col-sm-4">
                   <x-form.input
                       name="start-time"
                       label="start_time"
                       type="datetime-local"
                       :required="true"
                       data-rules="required"
                       />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="end-time"
                        label="end_time"
                        type="datetime-local"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="description"
                        label="description"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="comment"
                        label="comment"
                    />
                </div>

                <div class="col-sm-4">
                    <button type="button">Add to Calendar</button>
                </div>

                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                </div>
            </div>
        </x-form>

    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
        });
    </script>
@endpush
