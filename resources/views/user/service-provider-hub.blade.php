@extends('layouts.master')

@if(!empty($title))
    @section('title', $title)
@endif

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Service Provider Hub</h3>
        </x-slot>

        <table class="table table-bordered" id="user_hub_table">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Action</th>
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
