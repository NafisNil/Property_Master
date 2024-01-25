@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Schedule Type Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-  Schedule Type')}}</h3>
        </x-slot>
        <form action="{{ route('stype.store') }}" method="POST">
            @csrf
            @include('stype.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
