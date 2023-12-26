@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-stall')}}</h3>
        </x-slot>

        <x-form action="{{route('parking-stalls.store')}}">
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="name"
                        label="name"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="lot_id"
                        label="parking-lot"
                        :options="$parkingLots"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="parker_type_id"
                        label="parker-type"
                        :options="$parkerTypes"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="dedicated_no"
                        label="dedicated-no"
                    />

                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="location"
                        label="location"
                    />

                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="size"
                        label="size"
                    />

                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>
        </x-form>

    </x-content>
@endsection
