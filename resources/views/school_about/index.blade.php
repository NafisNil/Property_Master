@extends('layouts.master')

@section('page_title')
    About {{$school->name}}
@endsection

@section('content')

    <x-content>
        <x-slot name="header">
            <h3>{{__('about')}} {{$school->name}}</h3>
            <a href="{{route('SchoolAbout.messageEdit')}}"
            class="btn btn-primary"
            >{{__('edit')}}</a>
        </x-slot>
        <div class="portlet-body col-md-12" style="padding: 30px 15px;">
            <div>
                {{$school->about ?? 'No Message'}}
            </div>
        </div>
    </x-content>
@endsection


