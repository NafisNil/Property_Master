@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-shipping-log')}}</h3>
        </x-slot>

        <form action="{{ route('shipping-logs.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input name="shipping_no" label="shipping-no"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="date" label="date"
                        type="datetime-local"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="items" label="items"/>
                </div>

                <div class="col-sm-4">
                    <x-form.input name="recipient_name"
                                  label="recipient-name"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="recipient_phone" label="recipient-phone"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="recipient_address" label="recipient-address"/>
                </div>

                <div class="col-sm-4">
                    <x-form.input name="courier_company" label="courier-company"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="confirmation_no" label="confirmation-no"/>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">{{__('submit')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
