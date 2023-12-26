@extends('layouts.master')

@section('page_title')
    {{__('update-tax')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('taxes.index') }}">{{__('taxes')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('taxes')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('update-tax')}}</h3>
        </x-slot>

        @include('partials.error-alert', ['errors'=> $errors])

        <form action="{{ route('taxes.update', $tax->id) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="name"
                        :required="true"
                        data-rules="required"
                        value="{{$tax->name}}"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="code"
                        label="code"
                        :required="true"
                        data-rules="required"
                        value="{{$tax->code}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="tax_type_id"
                        label="tax-type"
                        :options="$taxTypes"
                        :required="true"
                        data-rules="required"
                        value="{{$tax->tax_type_id}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="rate"
                        label="rate-percent"
                        :required="true"
                        data-rules="required|number"
                        value="{{$tax->rate}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="reporting"
                        label="reporting"
                        :options="$reportingPeriods"
                        value="{{$tax->reporting}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_name"
                        label="office-name"
                        :required="true"
                        data-rules="required"
                        value="{{$tax->office_name}}"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="office_phone"
                        label="office-phone"
                        :required="true"
                        data-rules="required"
                        value="{{$tax->office_phone}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_email"
                        label="office-email"
                        value="{{$tax->office_email}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_website"
                        label="office-website"
                        value="{{$tax->office_website}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="office_address"
                        label="office-address"
                        :required="true"
                        data-rules="required"
                        value="{{$tax->office_address}}"
                    />
                </div>

                <div class="col-sm-6">
                    @include('partials.active-status', ['status' => $tax->status])
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
