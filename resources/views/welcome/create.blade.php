@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Welcome - Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Welcome Post')}}</h3>
        </x-slot>
        <form action="{{ route('welcome.store') }}" method="POST">
            @csrf
            @include('welcome.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
