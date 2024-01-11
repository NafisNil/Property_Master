@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Complain -  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Complain')}}</h3>
        </x-slot>
        <form action="{{ route('complain.store') }}" method="POST">
            @csrf
            @include('complain.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
