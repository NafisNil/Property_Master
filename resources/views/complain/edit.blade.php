@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Complain
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('Complain-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('complain.update', [$complain]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('complain.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
