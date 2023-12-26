@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__("daily-report")}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('DailyReport.index') }}">Daily Report</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daily Report</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__("daily-report")}}</h3>
            <a href="{{route('DailyReport.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div class="table-responsive">

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th class="text-center">{{__('report-no')}}</th>
                    <th class="text-center">{{__('name')}}</th>
                    <th class="text-center">{{__('department')}}</th>
                    <th class="text-center">{{__('date')}}</th>
                    <th>{{__('start_time')}}</th>
                    <th>{{__('end_time')}}</th>
                    <th class="text-center">{{__('action')}}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>

        @include('partials.action-buttons')

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

            $('#datatable').DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        defaultContent: '',
                        orderable: false,
                    }
                ],
                columns: [
                    {data: "report_no"},
                    {data: "name"},
                    {data: "department.name"},
                    {data: "date"},
                    {data: "start_time"},
                    {data: "end_time"},
                    {data: 'action'}
                ]
            })

        })

    </script>
@endpush
