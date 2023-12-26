@extends('layouts.master')

@push('css')
    @include('plugins.datetime-picker.css')
@endpush

@section('content')

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('notes.index') }}">{{__('notes')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('notes')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h4>{{__("add-note")}}</h4>
        </x-slot>

        <form action="{{route('notes.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <x-form.input
                        name="date"
                        label="date-time" class="date-time-picker"
                        value="{{now()}}"
                    />
                </div>
                <div class="col-12">
                    <x-form.input
                        name="title"
                        label="title"
                        required="true"
                    />
                </div>
                <div class="col-12">
                    <x-form.textarea name="content"
                                     label="content"></x-form.textarea>
                </div>
                <div class="col-12">
                    <x-form.input
                        name="action_date"
                        label="action-date"
                        class="date-time-picker"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>
        </form>

    </x-content>

@endsection

@push('js')
    @include('plugins.datetime-picker.js')
@endpush
