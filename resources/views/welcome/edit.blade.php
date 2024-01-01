@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    About  - Welcome
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-welcome')}}</h3>
        </x-slot>
        <form action="{{ route('welcome.update', [$welcome]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('welcome.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
