@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Schedule -  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Schedule')}}</h3>
        </x-slot>
        <form action="{{ route('scheduleop.store') }}" method="POST">
            @csrf
            @include('scheduleop.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
