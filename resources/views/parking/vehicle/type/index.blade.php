@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('vehicle-types')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('vehicle-types.index') }}">{{__('vehicle-types')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('vehicle-types')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('vehicle-types')}}</h3>
            <a href="{{route('vehicle-types.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div class="table-responsive">
            <table id="vehicle_types_table" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">{{__('name')}}</th>
                    <th class="text-center">{{__('action')}}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            let dataTable = $('#vehicle_types_table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: window.location.pathname,
                columns: [
                    {data: 'name'},
                    {data: 'actions'}
                ]
            })

        })

    </script>
@endpush
