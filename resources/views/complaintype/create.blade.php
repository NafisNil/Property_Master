@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Complain Type  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Newfile')}}</h3>
        </x-slot>
        <form action="{{ route('complaintype.store') }}" method="POST">
            @csrf
            @include('complaintype.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
