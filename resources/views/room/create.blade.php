@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('page_title')
    {{__('add-new-room')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">{{__('rooms')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('rooms')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-room')}}</h3>
        </x-slot>

        <form action="{{ route('rooms.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="room_no"
                        label="{{__('room-number')}}"
                        required="true"
                    />

                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="room-name"
                        required="true"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="type_id"
                        label="room-type"
                        :options="$parentTypes"
                        id='selectRoomType'
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="sub_type_id"
                        label="room-sub-type"
                        :options="[]"
                        id="selectSubType"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="campus_id"
                        label="campus"
                        :options="$campuses"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="department_id"
                        label="department"
                        :options="$departments"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="location"
                        label="Location"
                    />

                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="capacity"
                        label="number-of-occupants"
                        required="true"
                    />
                </div>

                <div class="col-sm-12">
                    <input type="hidden" name="index" value="0"
                           id="asset_index"
                    >
                    <x-form.select
                        name="assets"
                        label="attached-fixed-assets"
                        :options="$assets"
                    />
                </div>

                <div class="col-12">

                    <table class="table table-bordered" id="assets_table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Serial</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="temperature"
                        label="room-temperature"
                    />
                </div>

                <div class="col-sm-12">
                    <input type="hidden" name="index" value="0"
                           id="device_index"
                    >
                    <x-form.select
                        name="devices"
                        label="device"
                        :options="$assets"
                    />
                </div>

                <div class="col-12" id="device_container">
                    <table class="table table-bordered" id="devices_table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Serial</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="schedule_inspection_date"
                        label="schedule-inspection-date"
                        type="datetime-local"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="reading_meters"
                        label="reading-meters"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="files"
                        label="Photos"
                        type="file"
                        accept="image/*"
                        multiple="true"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="account"
                        label="account"
                        />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="cost_center"
                        label="cost-center"
                    />
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary submit">{{__('submit')}}</button>
                </div>
            </div>
        </form>

    </x-content>

@endsection

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript">
        $(document).ready(function ($) {
            $(document).on('change', '#selectRoomType', function () {

                let id = this.value;

                $.ajax({
                    url: `/get-child-room-types?id=${id}`,
                    success: function (data) {

                        // Transforms the top-level key of the response object from 'items' to 'results'
                        let options = '<option value="">Select Sub Category</option>';
                        data.map(item => {
                            options += `<option value='${item.id}'>${item.name}</option>`
                        })

                        $('#selectSubType').html(options);

                    },
                    error: function () {

                    }
                })

            })
            $('#devices').on('change', function () {
                let id = this.value;

                let index = $('#device_index').val();

                $('#device_index').val(index + 1);

                $.ajax({
                    url: `/get-asset-row-for-room?id=${id}&index=${index}&type=device`,
                    success: function (tr) {
                        let td = $('#devices_table').find('tbody')
                            .append(tr);

                    }
                })
            })

            $('#assets').on('change', function () {
                let id = this.value;

                let index = $('#asset_index').val();

                $('#asset_index').val(index + 1);

                $.ajax({
                    url: `/get-asset-row-for-room?id=${id}&index=${index}&type=asset`,
                    success: function (tr) {
                        let td = $('#assets_table').find('tbody')
                            .append(tr);

                    }
                })
            })

        });
    </script>
@endpush
