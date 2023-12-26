@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('content')

    <x-content>
        <x-slot name="header">
            <h3>Time and Date Format</h3>
        </x-slot>

        <form action="{{route("time-and-date-format.store")}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <x-form.select
                        name="time_format"
                        label="time-format"
                        :options="$timeFormats"
                        value="{{$school->time_format ?? ''}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="date_format"
                        label="date-format"
                        :options="$dateFormats"
                        value="{{$school->date_format ?? ''}}"
                    />
                </div>

                <div class="col-4">
                    <label>Select Time Zone</label>
                    <select name="time_zone" class="form-control">
                        <option value="">--select-one</option>
                        @foreach($timeZones as $timeZone)
                            <option value="{{$timeZone}}"
                                    @if($school->time_zone && $timeZone == $school->time_zone)
                                        selected="selected"
                                @endif
                            >{{$timeZone}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-primary float-right" type="submit">{{__('update')}}</button>
                </div>
            </div>
        </form>

    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
@endpush
