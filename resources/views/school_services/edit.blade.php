@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
    {{$school_info->name}} Services Edit
@endsection

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{$school_info->name}} Services Edit</h3>
        </x-slot>
        <form action="{{ route('SchoolServices.Update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Services</label>
                        <textarea name="services" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
                                  required>{{$school_info->services}}</textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
            </div>

            <input type="hidden" name="school_id" value="{{ ($school_info->id) ? $school_info->id : '' }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </x-content>
@endsection
