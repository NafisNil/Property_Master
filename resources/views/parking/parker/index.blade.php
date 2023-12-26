@extends('layouts.master')

@section('page-title')
    {{__('storage-locker')}}
@endsection

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('parkers')}}</h3>
            <a href="{{route("parkers.create")}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div class="table-responsive">
            <table class="table table-bordered" id="storage_table">
                <thead>
                <tr>
                    <th>{{__('name')}}</th>
                    <th>{{__('image')}}</th>
                    <th>{{__('license-no')}}</th>
                    <th>{{__('expiry-date')}}</th>
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
                    {data: 'name'},
                    {data: 'image'},
                    {data: 'license_no'},
                    {data: 'expiry_date'},
                    {data: "action"}
                ]
            })
        })
    </script>
@endpush
