@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    What  is New - Edit
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-what is new')}}</h3>
        </x-slot>
        <form action="{{ route('whatnew.update', [$newfile]) }}" method="POST">
            @csrf
            @method('PUT')
            @include('whatnew.form')
            
        </form>
    </x-content>
@endsection

@push('js')
@endpush
