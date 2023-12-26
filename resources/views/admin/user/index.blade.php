@extends('admin.layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Admin Users</h4>
            <a href="{{route('admin.admin-users.create')}}" class="btn btn-primary">Add</a>
        </x-slot>
        <div>
            <table class="table table-bordered" id="admin_users_table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#admin_users_table').DataTable({
                columns:[
                    {
                        data: 'username',
                    },
                    {
                        data: 'email'
                    }
                ]
            })
        })
    </script>
@endpush
