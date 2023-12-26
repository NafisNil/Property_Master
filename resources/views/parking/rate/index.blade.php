@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('parking-rates')}}</h3>
            <a href="{{route('parking-rates.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="parking_rate_table">
                <thead>
                <tr>
                    <th>{{__('parker-type')}}</th>
                    <th>{{__('amount')}}</th>
                    <th>{{__('tax')}}</th>
                    <th>{{__('amount-after-tax')}}</th>
                    <th>{{__('expire-rate')}}</th>
                    <th>{{__('action')}}</th>
                </tr>
                </thead>
            </table>
        </div>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#parking_rate_table').DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        searchable: false,
                        orderable: false,
                        defaultContent: ''
                    },
                ],
                columns: [
                    {data: "type.name"},
                    {data: 'amount'},
                    {data: "tax"},
                    {data: 'amount_after_tax'},
                    {data: "expire_rate"},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
