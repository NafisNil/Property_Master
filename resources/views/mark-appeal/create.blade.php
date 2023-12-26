@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>{{__('add-new-appeal')}}</h4>
        </x-slot>

        <form method="POST" action="{{route('mark-appeals.store')}}" enctype="multipart/form-data"
        class="validate" novalidate
        >
            @csrf
            <div class="row">

                <div class="col-sm-4">
                    <x-form.input
                        name="file_no"
                        label="file-no"
                        required="true"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="mark_post_date"
                        label="mark-post-date"
                        type="datetime-local"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="assessment_id"
                        label="select-assessment"
                        :options="$assessments"
                        required="true"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="received_mark"
                        label="received-assessment-mark"
                        type="number"
                        required="true"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="comment"
                        label="comment"
                    />
                </div>

                <div class="col-12">
                    <x-form.textarea
                        name="appeal_reason"
                        label="appeal-reason"
                    />
                </div>

                <div class="col-12">
                    <x-form.input
                        type="file"
                        name="files"
                        label="documents"
                        accept="image/*, application/pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                        multiple
                    />
                </div>

                <div class="col-sm-12 mt-3">
                    <button class="btn btn-primary float-right" type="submit">{{__('submit')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection

@include('plugins.jquery-validation')
