@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Announcement
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('Announcement-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('announcement.update', [$announcement]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('announcement.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
