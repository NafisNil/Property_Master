@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('receiving-logs')}}</h3>
            <a href="{{route('receiving-logs.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <table id="shipments-table" class="table table-bordered">
            <thead>
            <tr>
                <th>receiving No</th>
                <th>Date</th>
                <th>Items</th>
                <th>sender Name</th>
                <th>sender Phone</th>
                <th>sender Address</th>
                <th>Courier Company</th>
                <th>Confirmation No</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <!-- Data will be loaded dynamically via DataTables -->
            </tbody>
        </table>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#shipments-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('receiving-logs.index') }}",
                columnDefs: [
                    {
                        targets: "_all",
                        defaultContent: '',
                        orderable: false,
                    }
                ],
                columns: [
                    {data: 'receiving_no', name: 'receiving_no'},
                    {data: 'date', name: 'date'},
                    {data: 'items', name: 'items'},
                    {data: 'sender_name', name: 'sender_name'},
                    {data: 'sender_phone', name: 'sender_phone'},
                    {data: 'sender_address', name: 'sender_address'},
                    {data: 'courier_company', name: 'courier_company'},
                    {data: 'confirmation_no', name: 'confirmation_no'},
                    {data: 'action', name: 'action', searchable: false}
                ]
            });
        })
    </script>
@endpush
