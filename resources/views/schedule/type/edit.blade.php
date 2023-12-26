@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-schedule-type')}}</h3>
        </x-slot>
        <form action="{{route("schedule-types.update", $scheduleType->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                        required="required"
                        value="{{$scheduleType->name}}"
                    />
                </div>
                <div class="col-sm-4">
                    @include('partials.active-status', ['status' => $scheduleType->status])
                </div>
                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">{{__('update')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
