@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('update-fixed-asset')}}
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
            <h3>{{__('update-fixed-asset')}}</h3>
        </x-slot>


        <form action="{{ route('fixed-assets.update', $item->id) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="asset_name"
                        label="asset-name"
                        required="true"
                        value="{{$item->asset_name}}"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="serial_number"
                        label="serial-number"
                        value="{{$item->serial_number}}"
                    />

                </div>

                <div class="col-sm-6">

                    <x-form.select
                        name="asset_type_id"
                        label="asset-type"
                        :options="$parentTypes"
                        id="selectAssetType"
                        value="{{$item->asset_type_id}}"
                    />


                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="asset_sub_type_id"
                        label="asset-sub-type"
                        :options="$childTypes"
                        id="selectAssetSubType"
                        value="{{$item->asset_sub_type_id}}"
                    />

                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="asset-condition"
                        label="Asset Condition"
                        :options="$assetConditions"
                        value="{{$item->asset_condition}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="model"
                        label="model"
                        value="{{$item->model}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="color"
                        label="color"
                        value="{{$item->color}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="size"
                        label="size"
                        value="{{$item->size}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="length"
                        label="length"
                        value="{{$item->length}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="width"
                        label="width"
                        value="{{$item->width}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="weight"
                        label="weight"
                        value="{{$item->weight}}"
                    />
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                           name="created_by">
                    <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                           name="updated_by">
                    <button type="submit" class="btn btn-primary submit">{{__('update')}}</button>
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
