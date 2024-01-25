@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Recurring Cycle Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Recurring Cycle')}}</h3>
        </x-slot>
        <form action="{{ route('recurring.store') }}" method="POST">
            @csrf
            @include('recurring.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
