@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('rooms')}}
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
            <h3>{{__('safety-devices-checklist')}}</h3>
        </x-slot>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Item</th>
                <th>Location</th>
                <th>Serial No.</th>
                <th>Expiry Date</th>
                <th>Renew Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($assets as $asset)
                <tr>
                    <td>{{$asset->asset_name}}</td>
                    <td>{{$asset->rooms->first()->location ?? ''}}</td>
                    <td>{{$asset->serial_number}}</td>
                    <td>{{$asset->expiry_date ?? ''}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </x-content>
@endsection
