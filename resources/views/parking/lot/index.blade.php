@extends('layouts.master')

@section('content')
<x-content>
    <x-slot name="header">
        <h3>{{__('parking-lot')}}</h3>
        <a href="{{route('parking-lots.create')}}">{{__('add-new')}}</a>
    </x-slot>

    <div class="table-responsive">
        <table class="table table-bordered" id="parking_lot_table">
            <thead>
            <tr>
                <th>{{__('lot-number')}}</th>
                <th>{{__('lot-name')}}</th>
                <th>{{__('total-stalls')}}</th>
                <th>{{__('actions')}}</th>
            </tr>
            </thead>
        </table>
    </div>

</x-content>

@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#parking_lot_table').DataTable({
                ajax: window.location.pathname,
                columns: [
                    {data: "lot_no"},
                    {data: "lot_name"},
                    {data: "total_stalls"},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
