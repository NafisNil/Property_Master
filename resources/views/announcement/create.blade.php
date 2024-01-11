@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Announcement -  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Announcement')}}</h3>
        </x-slot>
        <form action="{{ route('announcement.store') }}" method="POST">
            @csrf
            @include('announcement.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
