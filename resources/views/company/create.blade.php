@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Company  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Newfile')}}</h3>
        </x-slot>
        <form action="{{ route('company.store') }}" method="POST">
            @csrf
            @include('company.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
