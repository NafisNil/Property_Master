@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('schedules')}}</h3>
            <a href="{{route('schedules.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="schedule_table">
                <thead>
                <tr>
                    <th>{{__('schedule-no')}}</th>
                    <th>{{__('title')}}</th>
                    <th>{{__('date')}}</th>
                    <th>{{__('type')}}</th>
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
            $('#schedule_table').DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        defaultContent: ''
                    }
                ],
                columns: [
                    {data: 'schedule_no'},
                    {data: 'title'},
                    {data: 'date'},
                    {data: "type.name"},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
