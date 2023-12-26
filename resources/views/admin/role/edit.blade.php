@extends('admin.layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Update Role</h3>
        </x-slot>

        <div>
            <form action="{{route("admin.roles.update", $role->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <x-form.input
                            name="name"
                            label="Role Name"
                            value="{{$role->name}}"
                        />
                    </div>

                    <div class="col-sm-4">
                        @include('partials.active-status', ['status' => $role->status])
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </x-content>
@endsection
