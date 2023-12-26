@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('booking')}}</h3>
            <a href="{{route('bookings.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>
        <table class="table table-bordered" id="bookings_table">
            <thead>
            <tr>
                <th>{{__('id')}}</th>
                <th>{{__('date')}}</th>
                <th>{{__('requester')}}</th>
                <th>{{__('request-type')}}</th>
                <th>{{__('request-date')}}</th>
                <th>{{__('payment-required')}}</th>
                <th>{{__('payment-refundable')}}</th>
                <th>{{__('amount')}}</th>
                <th>{{__('action')}}</th>
            </tr>
            </thead>
        </table>
    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            console.log('dd');
            $('#bookings_table').DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        defaultContent: '',
                        orderable: false,
                    }
                ],
                columns: [
                    {data: 'id'},
                    {data: 'date'},
                    {data: 'requester.full_name'},
                    {data: 'request_type'},
                    {data: 'request_date'},
                    {data: 'payment_required'},
                    {data: 'payment_refundable'},
                    {data: 'amount'},
                    {data:"action"}
                ]
            })
        })
    </script>
@endpush
