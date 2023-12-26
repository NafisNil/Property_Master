@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    About {{$school->name}} Edit
@endsection

@section('content')

    @include('partials.error-alert', ['errors' => $errors])
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-about')}}</h3>
        </x-slot>
        <form action="{{ route('SchoolAbout.messageUpdate') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">About</label>
                        <textarea name="about" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
                                  required>{{$school->about}}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('submit')}}</button>
        </form>
    </x-content>
@endsection

@push('js')
@endpush
