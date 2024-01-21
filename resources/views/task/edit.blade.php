@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Task
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('Task-new')}}</h3>
        </x-slot>
        <form action="{{ route('task.update', [$task]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('task.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
