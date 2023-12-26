@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-parker-type')}}</h3>
        </x-slot>
        <form action="{{route("parker-types.update", $parkerType->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                        required="required"
                        value="{{$parkerType->name}}"
                    />
                </div>
                <div class="col-sm-4">
                    @include('partials.active-status', ['status' => $parkerType->status])
                </div>
                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">{{__('update')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
