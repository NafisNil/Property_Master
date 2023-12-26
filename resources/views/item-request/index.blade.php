@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('request')}}</h3>
            <a href="{{route('requests.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="request_table">
                <thead>
                <tr>
                    <th>{{__('request-no')}}</th>
                    <th>{{__('date')}}</th>
                    <th>{{__('department')}}</th>
                    <th>{{__('section')}}</th>
                    <th>{{__('position')}}</th>
                    <th>{{__('user')}}</th>
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
            $("#request_table").DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        targets: '_all',
                        orderable: false,
                    }
                ],
                columns: [
                    {data: "request_no"},
                    {data: 'date'},
                    {data: 'department.name'},
                    {data: 'section'},
                    {data: 'position'},
                    {data: 'user.full_name'},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
