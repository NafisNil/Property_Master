@extends('layouts.master')

@section('content')

    @include('partials.error-alert',['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h3>{{__('parking-lot')}}</h3>
        </x-slot>

        <form action="{{route("parking-lots.store")}}" method="post">
            @csrf

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="lot_no"
                        label="lot-no"
                        required="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="lot_name"
                        label="lot-name"
                        required="required"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="total_stalls"
                        label="total-stalls"
                        required="required"
                    />
                </div>
                <div class="col-12">
                    <h4>Contact</h4>
                </div>
                @include('partials.contact', ['prefix' => 'contact'])
                <div class="col-12">
                    <h4>Address</h4>
                </div>
                @include('partials.address')

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>

        </form>

    </x-content>
@endsection
