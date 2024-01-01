@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Newfile {{@$newfile->name}} Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Newfile')}}</h3>
        </x-slot>
        <form action="{{ route('newfile.store') }}" method="POST">
            @csrf
            @include('newfile.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
