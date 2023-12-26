@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Fee Categories</h3>
        </x-slot>

        <x-form action="{{route('fee-categories.update', $feeCategory->id)}}"
                method="PUT"
        >
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="Name*"
                        value="{{$feeCategory->name}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="parent_id"
                        label="Parent"
                        :options="$parentCategories"
                        value="{{$feeCategory->parent_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    @include('partials.active-status', ['status' => $feeCategory->status])
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">Save</button>
                </div>

            </div>
        </x-form>

    </x-content>
@endsection
