@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    What is New - Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-What is new')}}</h3>
        </x-slot>
        <form action="{{ route('whatnew.store') }}" method="POST">
            @csrf
            @include('whatnew.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
