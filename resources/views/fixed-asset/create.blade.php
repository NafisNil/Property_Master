@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__("add-fixed-asset")}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('fixed-assets.index') }}">{{__('fixed-assets')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('fixed-assets')}}</li>
        </ol>
    </nav>

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h4>{{__('add-fixed-asset')}}</h4>
        </x-slot>

        <form action="{{ route('fixed-assets.store') }}" method="POST"
              enctype="multipart/form-data"
              class="validate-form"
        >
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <x-form.input
                            name="asset_name"
                            label="asset-name"
                            required="true"
                            data-rules="required"
                        />
                    </div>
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="serial_number"
                        label="serial-number"
                    />

                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="asset_type_id"
                        label="asset-type"
                        :options="$parentTypes"
                        id="selectAssetType"
                        :required="true"
                        data-rules="required"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="asset_sub_type_id"
                        label="asset-sub-type"
                        :options="[]"
                        id="selectAssetSubType"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="asset_condition"
                        label="Asset Condition"
                        :options="$assetConditions"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="model"
                        label="model"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="color"
                        label="color"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="size"
                        label="size"
                        data-rules="number"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="length"
                        label="length"
                        data-rules="number"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="width"
                        label="width"
                        data-rules="number"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="weight"
                        label="weight"
                        data-rules="number"
                    />
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
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
            $(document).on('change', '#selectAssetType', function () {

                let id = this.value;

                $.ajax({
                    url: `/get-child-asset-types?id=${id}`,
                    success: function (data) {

                        // Transforms the top-level key of the response object from 'items' to 'results'
                        let options = '<option value="">Select Sub Category</option>';
                        data.map(item => {
                            options += `<option value='${item.id}'>${item.name}</option>`
                        })

                        $('#selectAssetSubType').html(options);

                    },
                    error: function () {

                    }
                })

            })
        });
    </script>
@endpush
