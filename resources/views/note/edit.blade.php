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
            <h4>{{__('update-note')}}</h4>
        </x-slot>

        <form action="{{route('notes.update', $note->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12">
                    <x-form.input
                        name="date" label="date-time" class="date-time-picker"
                        value="{{$note->date}}"
                    />
                </div>
                <div class="col-12">
                    <x-form.input name="title" label="Title*"
                                  value="{{$note->title}}"
                    />
                </div>
                <div class="col-12">
                    <x-form.textarea name="content" label="content"
                                     value="{{$note->content}}"
                    ></x-form.textarea>
                </div>
                <div class="col-12">
                    <x-form.input
                        name="action_date" label="action-date"
                        class="date-time-picker"
                        value="{{$note->action_date}}"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__("update")}}</button>
                </div>

            </div>
        </form>

    </x-content>

@endsection

@push('js')
    @include('plugins.datetime-picker.js')
@endpush
