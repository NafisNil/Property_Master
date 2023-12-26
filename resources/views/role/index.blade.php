@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Roles</h3>
            <a href="{{route('roles.create')}}" class="btn btn-primary">Add</a>
        </x-slot>

        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ strtok($role->name, '#') }}</td>
                        <td>
                            @if($role->status)
                                <span class="badge badge-primary">Active</span>
                            @else
                                <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('roles.show', $role->id)}}" class="btn btn-info">View</a>
                            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </x-content>

@endsection
