@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('stall-allocation')}}</h3>
            <a href="{{route('parking-stall-allocation.create')}}">{{__('add-new')}}</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="install_allocation_table">
                <thead>
                <tr>
                    <th>{{__('stall-number')}}</th>
                    <th>{{__('dedicated-no')}}</th>
                    <th>{{__('parker-type')}}</th>
                    <th>{{__('parker')}}</th>
                    <th>{{__('stall-allocation')}}</th>
                    <th>{{__('vehicle-no')}}</th>
                    <th>{{__('vehicle-model')}}</th>
                </tr>
                </thead>
            </table>
        </div>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#install_allocation_table').DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        defaultContent: '',
                        orderable: false,
                    }
                ],
                columns: [
                    {data: 'stall.stall_no'},
                    {data: 'stall.dedicated_no'},
                    {data: 'parker_type.name'},
                    {data: 'parker.name'},
                    {defaultContent: 'Allocated'},
                    {data: 'vehicle.vehicle_no'},
                    {data: 'vehicle.model'}
                ]
            })
        })
    </script>
@endpush
