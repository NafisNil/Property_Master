@extends('admin.layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Add New Education Level</h3>
        </x-slot>

        @include('partials.error-alert', ['errors' => $errors])

        <x-form action="{{route('admin.education-levels.store')}}" >

            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="Education Level Name*"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="start_grade"
                        label="Start Grade"
                    />
                </div>

                <div class="col-sm-6">
                    <x-form.input
                        name="end_grade"
                        label="End Grade"
                    />
                </div>

                <div class="col-sm-6">
                    @include('partials.active-status')
                </div>

                <div class="col-sm-6">
                    <x-form.textarea
                        name="description"
                        label="Description"
                    />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </x-form>

    </x-content>
@endsection
