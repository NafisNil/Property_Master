@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Remainder
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('Remainder-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('remainder.update', [$remainder]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('remainder.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
