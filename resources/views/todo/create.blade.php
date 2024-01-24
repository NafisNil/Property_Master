@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    ToDo List -  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-TodoList')}}</h3>
        </x-slot>
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            @include('todo.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
