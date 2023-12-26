@extends('layouts.master')

@section('page_title')
    {{__("update-daily-report")}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('DailyReport.index') }}">{{__("daily-report")}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('daily-report')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('update-daily-report')}}</h3>
        </x-slot>

        <div class="row">
            <div class="col-12">
                @include('partials.error-alert',['errors' => $errors])
            </div>
        </div>

        <x-form action="{{ route('DailyReport.update', $dailyReport->id) }}"
        class="validate-form"
        >
            @csrf
            <div class="row">

                <div class="col-sm-4">
                    <x-form.input
                        name="report_no"
                        label="report-no"
                        value="{{$dailyReport->report_no}}"
                        :required="true"
                        data-rules="required"
                        readonly
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                        value="{{$dailyReport->date}}"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                        value="{{$dailyReport->name}}"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="department_id"
                        label="department"
                        :options="$departments"
                        value="{{$dailyReport->department_id}}"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-12"><h3>{{__('reporting-time')}}</h3></div>

                <div class="col-sm-4">
                    <x-form.input
                        name="start_time"
                        label="start_time"
                        type="datetime-local"
                        value="{{$dailyReport->start_time}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="end_time"
                        label="end_time"
                        type="datetime-local"
                        value="{{$dailyReport->end_time}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="description"
                        label="description"
                        value="{{$dailyReport->description}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="comment"
                        label="comment"
                        value="{{$dailyReport->comment}}"
                    />
                </div>

                <div class="col-sm-4">
                    <button>Add to Calendar</button>
                </div>

                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary submit">{{__('update')}}</button>
                </div>
            </div>
        </x-form>

    </x-content>

@endsection
