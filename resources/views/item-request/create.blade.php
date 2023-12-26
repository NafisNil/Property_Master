@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-request')}}</h3>
        </x-slot>

        <div>
            @include('partials.error-alert', ['errors' => $errors])
        </div>

        <x-form action="{{route('requests.store')}}">

            <div class="row">

                <div class="col-sm-4">
                    <x-form.input
                        name="request_no"
                        label="request-no"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="department_id"
                        label="department"
                        :options="$departments"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="section"
                        label="section"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="position"
                        label="position"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="user_id"
                        label="user"
                        :options="$users"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="type"
                        label="request-type"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="priority_level"
                        label="Priority Level"
                        :options="$priorityLevels"
                    />
                </div>

                <div class="col-sm-4">

                    <x-form.textarea
                        name="description"
                        label="description"
                        rows="4"
                    />
                </div>

                <div class="col-sm-4"
                >
                    <x-form.input
                        name="status"
                        label="status"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.textarea
                        name="comment"
                        label="comment"
                        rows="4"
                    />
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>
        </x-form>

    </x-content>
@endsection
