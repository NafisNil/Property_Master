@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('schedule-types')}}</h3>
            <a href="{{route("schedule-types.create")}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>
        <div>
            <table class="table table-bordered" id="schedule_type_table">
                <thead>
                <tr>
                    <th>{{__('name')}}</th>
                    <th>{{__('status')}}</th>
                    <th>{{__('action')}}</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#schedule_type_table').DataTable({
                ajax: window.location.pathname,
                columns: [
                    {data: 'name'},
                    {data: 'status'},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
