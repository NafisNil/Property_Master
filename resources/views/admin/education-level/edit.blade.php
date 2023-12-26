@extends('admin.layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Update Education Level</h3>
        </x-slot>

        @include('partials.error-alert', ['errors' => $errors])

        <x-form action="{{route('admin.education-levels.update', $educationLevel->id)}}"
        method="put"
        >

            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="Education Level Name*"
                        value="{{$educationLevel->name}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="start_grade"
                        label="Start Grade"
                        value="{{$educationLevel->start_grade}}"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="end_grade"
                        label="End Grade"
                        value="{{$educationLevel->end_grade}}"
                    />
                </div>

                <div class="col-sm-6">
                    @include('partials.active-status', ['status' => $educationLevel->status])
                </div>

                <div class="col-sm-6">
                    <x-form.textarea
                        name="description"
                        label="Description"
                        value="{{ $educationLevel->description }}"
                    />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </x-form>

    </x-content>
@endsection
