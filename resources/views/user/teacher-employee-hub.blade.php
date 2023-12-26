@extends('layouts.master')

@if(!empty($title))
    @section('title', $title)
@endif

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{$userType->name}} Hub</h3>
        </x-slot>

        <table class="table table-bordered" id="user_hub_table">
            <thead>
            <tr>
                <th>{{__('full_name')}}</th>
                <th>{{__('email')}}</th>
                <th>{{__('phone')}}</th>
                <th>{{__("gender")}}</th>
                <th>{{__('action')}}</th>
            </tr>
            </thead>
        </table>
    </x-content>
@endsection

@include('plugins.datatable')

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            let url = window.location.pathname;
            $('#user_hub_table').DataTable({
                ajax: url,
                columnDefs: [
                    {
                        targets: '_all',
                        defaultContent: '',
                    }
                ],
                columns: [
                    {data: 'full_name'},
                    {data: 'email'},
                    {data: 'mobile_phone'},
                    {data: "gender"},
                    {data: "action"},
                ]
            })
        });
    </script>
@endpush
