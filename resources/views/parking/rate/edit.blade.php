@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-parking-rate')}}</h3>
        </x-slot>

        <form action="{{route('parking-rates.update', $parkingRate->id)}}"
              method="post"
        >
            @csrf
            @method('put')

            <div class="row">
                <div class="col-12">
                    @include('partials.error-alert', ['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="parker_type_id"
                        label="parker-type"
                        :options="$parkerTypes"
                        value="{{$parkingRate->parker_type_id}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="amount"
                        label="amount"
                        value="{{$parkingRate->amount}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="tax"
                        label="tax"
                        value="{{$parkingRate->tax}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="expire_rate"
                        label="expire-rate"
                        value="{{$parkingRate->expire_rate}}"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">{{__('update')}}</button>
                </div>

            </div>
        </form>

    </x-content>
@endsection
