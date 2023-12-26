@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('template-builder')}}</h3>
            <a href="{{route('templates.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="template_table">
                <thead>
                <tr>
                    <th>{{__('template-name')}}</th>
                    <th>{{__('type')}}</th>
                    <th>{{__('user-type')}}</th>
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
            $("#template_table").DataTable({
                ajax: window.location.pathname,
                columnDefs: [
                    {
                        'targets': '_all',
                        orderable: false,
                        defaultContent: '',
                    }
                ],
                columns: [
                    {data: 'name'},
                    {data: "type"},
                    {data: 'user_type.name'},
                    {data: 'action'}
                ]
            })
        })
    </script>
@endpush
