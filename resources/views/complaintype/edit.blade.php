@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    About Complain Type
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-newfile')}}</h3>
        </x-slot>
        <form action="{{ route('complaintype.update', [$company]) }}" method="POST">
            @csrf
            @method('PUT')
        @include('complaintype.form')
         
        </form>
    </x-content>
@endsection

@push('js')
@endpush
