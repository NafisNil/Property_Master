@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('update-room')}}
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

        <form action="{{ route('rooms.update', $room->id) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="room_no"
                        label="room-number"
                        required="true"
                        value="{{$room->room_no}}"
                    />

                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="room-name"
                        required="true"
                        value="{{$room->name}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="type_id"
                        label="room-type"
                        :options="$parentTypes"
                        id='selectRoomType'
                        value="{{$room->type_id}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="sub_type_id"
                        label="room-sub-type"
                        :options="$childTypes"
                        id="selectSubType"
                        value="{{$room->sub_type_id}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="campus_id"
                        label="campus"
                        :options="$campuses"
                        value="{{$room->campus_id}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.select
                        name="department_id"
                        label="department"
                        :options="$departments"
                        value="{{$room->department_id}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="location"
                        label="Location"
                        value="{{$room->location}}"
                    />

                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="capacity"
                        label="number-of-occupants"
                        required="true"
                        value="{{$room->capacity}}"
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
                        <tbody>
                        @foreach($attachedAssets as $index=>$device)
                            @include('room.asset-row', ['item' => $device, 'index' => $index])
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="temperature"
                        label="room-temperature"
                        value="{{$room->temperature}}"
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
                        <tbody>
                        @foreach($attachedDevices as $index=>$device)
                            @include('room.device-row', ['item' => $device, 'index' => $index])
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="schedule_inspection_date"
                        label="schedule-inspection-date"
                        type="datetime-local"
                        value="{{$room->schedule_inspection_date}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="reading_meters"
                        label="reading-meters"
                        value="{{$room->reading_meters}}"
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
                        value="{{$room->account}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="cost_center"
                        label="cost-center"
                        value="{{$room->cost_center}}"
                    />
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-sm-12">
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

                $('#devices').on('change', function () {
                    let id = this.value;

                    let index = $('#device_index').val();

                    $('#device_index').val(index + 1);

                    $.ajax({
                        url: `/get-asset-row-for-room?id=${id}&index=${index}`,
                        success: function (tr) {
                            let td = $('#devices_table').find('tbody')
                                .append(tr);

                        }
                    })
                })

            })
        });
    </script>
@endpush
