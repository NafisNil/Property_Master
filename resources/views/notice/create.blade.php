@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    Notice -  Create
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-Notice')}}</h3>
        </x-slot>
        <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('notice.form')
        </form>
    </x-content>
@endsection

@push('js')

@endpush
