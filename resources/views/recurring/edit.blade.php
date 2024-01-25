@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    About Recurring Cycle
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Recurring Cycle')}}</h3>
        </x-slot>
        <form action="{{ route('recurring.update', [$recurring]) }}" method="POST">
            @csrf
            @method('PUT')
        @include('recurring.form')
         
        </form>
    </x-content>
@endsection

@push('js')
@endpush
