@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-shipping-log')}}</h3>
        </x-slot>

        <form action="{{ route('shipping-logs.update', $shippingLog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input name="shipping_no" label="shipping-no"
                                  value="{{$shippingLog->shipping_no}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="date" label="date"
                        type="datetime-local"
                        value="{{$shippingLog->date}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="items" label="items"
                                  value="{{$shippingLog->items}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input name="recipient_name"
                                  label="recipient-name"
                                  value="{{$shippingLog->recipient_name}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="recipient_phone" label="recipient-phone"
                                  value="{{$shippingLog->recipient_phone}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="recipient_address" label="recipient-address"
                                  value="{{$shippingLog->recipient_address}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input name="courier_company" label="courier-company"
                                  value="{{$shippingLog->courier_company}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="confirmation_no" label="confirmation-no"
                                  value="{{$shippingLog->confirmation_no}}"
                    />
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">{{__('update')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
