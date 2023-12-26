@extends('layouts.master')
@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('maintenance-checklist')}}</h3>
        </x-slot>

        <div class="row">
            <div class="col-sm-4">
                <x-form.input
                    name="checklist_no"
                    label="checklist-no"
                />
            </div>
            <div class="col-sm-4">
                <x-form.input
                    name="date"
                    label="date"
                />
            </div>

            <div class="col-sm-4">
                <x-form.select
                    name="schedule_period"
                    label="schedule-period"
                    :options="$periods"
                />
            </div>

            <div class="col-sm-4">
                <x-form.input
                    name="start_date"
                    label="start-date"
                />
            </div>

            <div class="col-sm-4">
                <x-form.input
                    name="end_date"
                    label="end-date"
                />
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
            </div>

        </div>

    </x-content>
@endsection
