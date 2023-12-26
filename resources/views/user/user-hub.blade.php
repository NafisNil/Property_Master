@extends('layouts.master')

@if(!empty($title))
    @section('title', $title)
@endif

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>User Hub</h4>

            <table class="table table-bordered" id="user_hub_table">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
@endsection

@include('plugins.datatable')

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
            let url = window.location.pathname;
            $('#user_hub_table').DataTable({
                ajax: url,
                columns: [
                    {data: 'full_name'},
                    {data: 'email'},
                    {data: "action"},
                ]
            })
        });
    </script>
@endpush
