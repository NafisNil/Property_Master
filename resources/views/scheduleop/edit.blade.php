@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Schedule 
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('Schedule-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('scheduleop.update', [$scheduleop]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('scheduleop.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
