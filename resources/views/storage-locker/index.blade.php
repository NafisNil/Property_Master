@extends('layouts.master')

@section('page-title')
    {{__('storage-locker')}}
@endsection

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('storage-lockers')}}</h3>
            <a href="{{route("storage-lockers.create")}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div class="table-responsive">
            <table class="table table-bordered" id="storage_table">
                <thead>
                <tr>
                    <th>{{__('storage-number')}}</th>
                    <th>{{__('storage-name')}}</th>
                    <th>{{__('total-lockers')}}</th>
                    <th>{{__('action')}}</th>
                </tr>
                </thead>
            </table>
        </div>
    </x-content>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#storage_table').DataTable({
                ajax: window.location.pathname,
                columns: [
                    {data: 'storage_no'},
                    {data: 'storage_name'},
                    {data: 'total_lockers'},
                    {data: "action"}
                ]
            })
        })
    </script>
@endpush
