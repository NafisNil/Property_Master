@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-request')}}</h3>
        </x-slot>

        <div>
            @include('partials.error-alert', ['errors' => $errors])
        </div>

        <x-form action="{{route('requests.update', $item->id)}}"
        method="PUT"
        >

            <div class="row">

                <div class="col-sm-4">
                    <x-form.input
                        name="request_no"
                        label="request-no"
                        value="{{$item->request_no}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date"
                        type="datetime-local"
                        value="{{$item->date}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="department_id"
                        label="department"
                        :options="$departments"
                        value="{{$item->department_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="section"
                        label="section"
                        value="{{$item->section}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="position"
                        label="position"
                        value="{{$item->position}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="user_id"
                        label="user"
                        :options="$users"
                        value="{{$item->user_id}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="type"
                        label="request-type"
                        value="{{$item->type}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="priority_level"
                        label="Priority Level"
                        :options="$priorityLevels"
                        value="{{$item->priority_level}}"
                    />
                </div>

                <div class="col-sm-4">

                    <x-form.textarea
                        name="description"
                        label="description"
                        rows="4"
                        value="{{$item->description}}"
                    />
                </div>

                <div class="col-sm-4"
                >
                    <x-form.input
                        name="status"
                        label="status"
                        value="{{$item->status}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.textarea
                        name="comment"
                        label="comment"
                        rows="4"
                        value="{{$item->comment}}"
                    />
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-primary" type="submit">{{__('update')}}</button>
                </div>

            </div>
        </x-form>

    </x-content>
@endsection
