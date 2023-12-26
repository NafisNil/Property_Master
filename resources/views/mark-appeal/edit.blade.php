@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>{{__('update-appeal')}}</h4>
        </x-slot>

        <form method="POST" action="{{route('mark-appeals.update', $markAppeal->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="file_no"
                        label="file-no"
                        value="{{$markAppeal->file_no}}"
                        disabled="true"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                        value="{{$markAppeal->date}}"
                        disabled="true"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="assessment_id"
                        label="select-assessment"
                        :options="$assessments"
                        value="{{$markAppeal->assessment_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="received_mark"
                        label="received-assessment-mark"
                        type="number"
                        value="{{$markAppeal->received_mark}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="comment"
                        label="comment"
                        value="{{$markAppeal->comment}}"
                    />
                </div>

                <div class="col-12">
                    <x-form.textarea
                        name="appeal_reason"
                        label="appeal-reason"
                        value="{{$markAppeal->appeal_reason}}"
                    />
                </div>

                <div class="col-12">
                    <x-form.input
                        type="file"
                        name="files"
                        label="documents"
                        accept="image/*, application/pdf"
                        multiple
                    />
                </div>

                <div class="col-sm-12 mt-3">
                    <button class="btn btn-primary float-right" type="submit">{{__('update')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
