@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Parking Stalls</h3>
            <a href="{{route('parking-stalls.create')}}">{{__('add-new')}}</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="stalls_table">
                <thead>
                <tr>
                    <th>{{__('stall-name')}}</th>
                    <th>{{__('dedicated-no')}}</th>
                    <th>{{__('location')}}</th>
                    <th>{{__('parking-lot')}}</th>
                    <th>{{__('size')}}</th>
                    <th>{{__('parker-type')}}</th>
                    <th>{{__('action')}}</th>
                </tr>
                </thead>
            </table>
        </div>


    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#stalls_table').DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        defaultContent: '',
                        sortable: false,
                        searchable: false,
                    }
                ],
                columns: [
                    {data: 'name'},
                    {data: 'dedicated_no'},
                    {data: 'location'},
                    {data: 'lot.lot_name'},
                    {data: 'size'},
                    {data: 'parker_type.name'},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
