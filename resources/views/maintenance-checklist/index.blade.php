@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('maintenance-checklist')}}</h3>
        </x-slot>
    </x-content>
@endsection
