@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    What is new 
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('what is new-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('whatnew.update', [$whatnew]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('whatnew.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
