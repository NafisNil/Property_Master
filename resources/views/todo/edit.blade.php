@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Todo List
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('Todo-new')}}</h3>
        </x-slot>
        <form action="{{ route('todo.update', [$todo]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('todo.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
