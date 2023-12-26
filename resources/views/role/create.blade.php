@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Add New Role</h3>
        </x-slot>

        <div>
            <form action="{{route("roles.store")}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <x-form.input
                            name="name"
                            label="Role Name"
                        />
                    </div>

                    <div class="col-sm-4">
                        @include('partials.active-status')
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </x-content>
@endsection
