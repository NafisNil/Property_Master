@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Add Tax
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('taxes.index') }}">{{__('taxes')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('taxes')}}</li>
        </ol>
    </nav>

    <x-content>

        @include('partials.error-alert', ['errors' => $errors])

        <x-slot name="header">
            <h3>{{__('add-tax')}}</h3>
        </x-slot>
        <form action="{{ route('taxes.store') }}" method="POST"
              enctype="multipart/form-data"
            class="validate-form"
        >
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="name"
                        :required="true"
                        data-rules="required"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="code"
                        label="code"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="tax_type_id"
                        label="tax-type"
                        :options="$taxTypes"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="rate"
                        label="rate-percent"
                        :required="true"
                        data-rules="required|number"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="reporting"
                        label="reporting"
                        :options="$reportingPeriods"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_name"
                        label="office-name"
                        :required="true"
                        data-rules="required"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="office_phone"
                        label="office-phone"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_email"
                        label="office-email"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_website"
                        label="office-website"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_address"
                        label="office-address"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-6">
                    @include('partials.active-status')
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                </div>
            </div>
        </form>
    </x-content>

@endsection
