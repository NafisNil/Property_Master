@extends('layouts.master')

@section('page_title')
    Services of {{$school_info->name}}
@endsection

@section('content')
    <x-content>
        <x-slot name="header">
            <h2 class="card-title">Services of {{$school_info->name}}</h2>
            <a href="{{route('SchoolServices.Edit', $school_info->id)}}"
            class="btn btn-primary"
            >{{__('edit')}}</a>
        </x-slot>
        <div class="" style="padding: 30px 15px;">
            <div>{{$school_info->services ?? "No Information"}}</div>
        </div>
    </x-content>
@endsection


