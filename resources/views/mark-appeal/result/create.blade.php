@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>{{__('resolve-mark-appeal')}}</h4>
        </x-slot>

        <form method="POST" action="{{route('mark-appeals.store-resolve', $markAppeal->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="file_no"
                        label="file-no"
                        value="{{$markAppeal->file_no}}"
                        disabled
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
                        name="reassessed_date"
                        label="reassessed-date"
                        type="datetime-local"
                    />
                </div>


                <div class="col-sm-4">
                    <x-form.input
                        name="reassessed_mark"
                        label="reassessed-mark"
                        type="number"
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
                        name="description"
                        label="description"
                    />
                </div>

                <div class="col-sm-12 mt-3">
                    <button class="btn btn-primary float-right" type="submit">{{__('submit')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
