@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Task -  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Task')}}</h3>
        </x-slot>
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            @include('task.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
