@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-parking-rate')}}</h3>
        </x-slot>

        <form action="{{route('parking-rates.store')}}"
              method="post"
        >
            @csrf

            <div class="row">
                <div class="col-12">
                    @include('partials.error-alert', ['errors' => $errors])
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
                        name="amount"
                        label="amount"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="tax"
                        label="tax"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="expire_rate"
                        label="expire-rate"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">{{__('submit')}}</button>
                </div>

            </div>
        </form>

    </x-content>
@endsection
