@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('parking-logs')}}</h3>
            <a href="{{route("parking-logs.create")}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <table id="parking-table" class="table table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Stall No</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Make</th>
                <th>Model</th>
                <th>Color</th>
                <th>Plate No</th>
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


            $('#parking-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('parking-logs.index') }}",
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'stall_no', name: 'stall_no'},
                    {data: 'start_time', name: 'start_time'},
                    {data: 'end_time', name: 'end_time'},
                    {data: 'make', name: 'make'},
                    {data: 'model', name: 'model'},
                    {data: 'color', name: 'color'},
                    {data: 'plate_no', name: 'plate_no'},
                    {data: "action", name: 'action'}
                ]
            });
        })
    </script>
@endpush
