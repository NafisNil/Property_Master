@extends('layouts.master')

@section('content')

    @include('partials.error-alert',['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h3>{{__('update-parking-lot')}}</h3>
        </x-slot>

        <form action="{{route("parking-lots.update", $parkingLot->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="lot_no"
                        label="lot-no"
                        required="required"
                        value="{{$parkingLot->lot_no}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="lot_name"
                        label="lot-name"
                        required="required"
                        value="{{$parkingLot->lot_name}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="total_stalls"
                        label="total-stalls"
                        required="required"
                        value="{{$parkingLot->total_stalls}}"
                    />
                </div>
                <div class="col-12">
                    <h4>Contact</h4>
                </div>
                @include('partials.contact', ['prefix' => 'contact', 'contact' => $parkingLot->contact])
                <div class="col-12">
                    <h4>Address</h4>
                </div>
                @include('partials.address', ['address' => $parkingLot->address])

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('update')}}</button>
                </div>

            </div>

        </form>

    </x-content>
@endsection
