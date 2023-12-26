@extends('admin.layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Education Levels</h3>
            <a href="{{route('admin.education-levels.create')}}" class="btn btn-primary">Add</a>
        </x-slot>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($educationLevels as $level)
                <tr>
                    <td>{{$level->name}}</td>
                    <td>
                        @if($level->status)
                            <span class="badge badge-primary">Active</span>
                        @else
                            <span class="badge badge-warning">
                        Inactive
                    </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.education-levels.edit', $level->id)}}"
                           class="btn btn-primary"
                        >
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

    </x-content>

@endsection
