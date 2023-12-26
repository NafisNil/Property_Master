@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('service-type')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('service-types.index') }}">{{__('service-types')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('service-types')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('add-service-type')}}</h3>
        </x-slot>
        <form action="{{ route('service-types.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="service-type-name"
                        />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" name="type" value="service"/>
                    <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                           name="created_by">
                    <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                           name="updated_by">
                    <button type="submit" class="btn btn-primary submit">{{__('submit')}}</button>
                </div>
            </div>
        </form>
    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript">
        jQuery(document).ready(function ($) {

        });
    </script>
@endpush
