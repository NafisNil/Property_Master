@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('vehicles')}}</h3>
            <a href="{{route("vehicles.create")}}">{{__('add-new')}}</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="vehicle_table">
                <thead>
                <tr>
                    <th>{{__("vehicle_no")}}</th>
                    <th>{{__('vehicle-type')}}</th>
                    <th>{{__('make')}}</th>
                    <th>{{__('model')}}</th>
                    <th>{{__('color')}}</th>
                    <th>{{__('year')}}</th>
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
            $('#vehicle_table').DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        orderable: false,
                        searchable: false,
                    }
                ],
                columns: [
                    {data: "vehicle_no"},
                    {data: 'type.name'},
                    {data: 'make'},
                    {data: 'model'},
                    {data: 'color'},
                    {data: "year"},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
