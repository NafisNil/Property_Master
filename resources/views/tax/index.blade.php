@extends('layouts.master')

@section('page_title')
    {{__('taxes')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('taxes.index') }}">Taxes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Taxes</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('taxes')}}</h3>
            <a href="{{route("taxes.create")}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div class="table-responsive">
            <table id="inventory-items-table" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Code</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Rate</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </x-content>

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#inventory-items-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                aaSorting: [],
                ajax: '/taxes',
                //note: yajra try to sort using first column
                //so never use a relationship instance in first column
                columnDefs: [
                    {
                        targets: '_all',
                        orderable: false,
                    }
                ],
                columns: [
                    {data: 'name'},
                    {data: 'code'},
                    {data: 'type'},
                    {data: 'rate'},
                    {data: 'actions'}
                ]
            })

        })

    </script>
@endpush
