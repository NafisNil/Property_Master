@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('welcome-message')}}</h3>
        </x-slot>
        <div>
            <x-form action="{{route('our-school.update-welcome-message')}}"
                    method="PUT" class="validate-form"
            >
                <x-form.textarea
                    name="welcome"
                    label="welcome-message"
                    :required="true"
                    data-rules="required"
                    value="{{$school->welcome}}"
                    :rows="10"
                />
                <button class="btn btn-primary">{{__('update')}}</button>
            </x-form>
        </div>
    </x-content>
@endsection
