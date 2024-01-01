@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    About {{@$newfile->name}} Newfile
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('newfile.update', [$newfile]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('newfile.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
