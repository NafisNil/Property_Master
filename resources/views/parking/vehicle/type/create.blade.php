@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('add-new-vehicle-type')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('vehicle-types.index') }}">{{__('vehicle-type')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('vehicle-type')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-vehicle-type')}}</h3>
        </x-slot>

        <form action="{{ route('vehicle-types.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-12">
                    @include('partials.error-alert', ['errors' => $errors])
                </div>
            </div>

            <div class="col-sm-6">
                <x-form.input
                    name="name"
                    label="type-name"
                    required="required"
                />
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary submit">{{__('submit')}}</button>
            </div>
        </form>
    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
@endpush
