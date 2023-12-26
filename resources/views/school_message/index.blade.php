@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('school-message')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SchoolMessage.index') }}">School Message</a></li>
            <li class="breadcrumb-item active" aria-current="page">School Message</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('school-message')}}</h3>
            <a href="{{ route('SchoolMessage.create') }}">
                <button type="button" class="btn btn-primary mb-2 text-right">{{__('add-new')}}</button>
            </a>
        </x-slot>

        <div>
            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Message No</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Priority level</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </x-content>
    <!-- Modal -->
    <div class="modal fade" id="director-profile" role="dialog">
        <div class="modal-dialog" style="max-width: 70%; width: auto !important;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" style="text-indent: 0;">x</button>
                    <h2 class="modal-title">School Message Details</h2>
                </div>
                <div class="modal-body">
                    <h2>School Message</h2>
                    <div id="direct-details"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <x-modal.fade id="view_modal"/>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#datatable").DataTable({
                ajax: window.location.pathname,
                columns: [
                    {data: 'message_no'},
                    {data: "message_date"},
                    {data: 'priority_level'},
                    {data: 'subject'},
                    {data: 'status'},
                    {data: 'action'}
                ],
            })
        })

        $(document).on('click', '.view-item-btn', function () {
            $('#view_modal').load($(this).data('href'), function () {
                $(this).modal('show');
            })
        })

    </script>
@endpush
