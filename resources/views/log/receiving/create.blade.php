@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-receiving-log')}}</h3>
        </x-slot>

        <form action="{{ route('receiving-logs.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-sm-4">
                    <x-form.input name="receiving_no" label="receiving-no"/>
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
                    <x-form.input name="sender_name"
                                  label="sender-name"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="sender_phone" label="sender-phone"/>
                </div>
                <div class="col-sm-4">
                    <x-form.input name="sender_address" label="sender-address"/>
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
