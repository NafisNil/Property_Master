@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Notice
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('Notice-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('notice.update', [$notice]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('notice.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
