@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-schedule-type')}}</h3>
        </x-slot>
        <form action="{{route("schedule-types.store")}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                        required="required"
                    />
                </div>
                <div class="col-sm-4">
                    @include('partials.active-status')
                </div>
                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
