@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Remainder -  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Remainder')}}</h3>
        </x-slot>
        <form action="{{ route('remainder.store') }}" method="POST">
            @csrf
            @include('remainder.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
