@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('shipping-logs')}}</h3>
            <a href="{{route('shipping-logs.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <table id="shipments-table" class="table table-bordered">
            <thead>
            <tr>
                <th>Shipping No</th>
                <th>Date</th>
                <th>Items</th>
                <th>Recipient Name</th>
                <th>Recipient Phone</th>
                <th>Recipient Address</th>
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
                ajax: "{{ route('shipping-logs.index') }}",
                columnDefs: [
                    {
                        targets: "_all",
                        defaultContent: '',
                        orderable: false,
                    }
                ],
                columns: [
                    {data: 'shipping_no', name: 'shipping_no'},
                    {data: 'date', name: 'date'},
                    {data: 'items', name: 'items'},
                    {data: 'recipient_name', name: 'recipient_name'},
                    {data: 'recipient_phone', name: 'recipient_phone'},
                    {data: 'recipient_address', name: 'recipient_address'},
                    {data: 'courier_company', name: 'courier_company'},
                    {data: 'confirmation_no', name: 'confirmation_no'},
                    {data: 'action', name: 'action', searchable: false}
                ]
            });
        })
    </script>
@endpush
