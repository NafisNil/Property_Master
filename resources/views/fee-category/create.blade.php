@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Fee Categories</h3>
        </x-slot>

        <x-form action="{{route('fee-categories.store')}}">
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="Name*"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="parent_id"
                        label="Parent"
                        :options="$parentCategories"
                    />
                </div>

                <div class="col-sm-4">
                    @include('partials.active-status')
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">Save</button>
                </div>

            </div>
        </x-form>

    </x-content>
@endsection
