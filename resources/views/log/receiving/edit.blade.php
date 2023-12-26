@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('update-receiving-log')}}</h3>
        </x-slot>

        <form action="{{ route('receiving-logs.update', $receivingLog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-12">
                    @include('partials.error-alert',['errors' => $errors])
                </div>

                <div class="col-sm-4">
                    <x-form.input name="receiving_no" label="receiving-no"
                                  value="{{$receivingLog->receiving_no}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="date" label="date"
                        type="datetime-local"
                        value="{{$receivingLog->date}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="items" label="items"
                                  value="{{$receivingLog->items}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input name="sender_name"
                                  label="sender-name"
                                  value="{{$receivingLog->sender_name}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="sender_phone" label="sender-phone"
                                  value="{{$receivingLog->sender_phone}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="sender_address" label="sender-address"
                                  value="{{$receivingLog->sender_address}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input name="courier_company" label="courier-company"
                                  value="{{$receivingLog->courier_company}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input name="confirmation_no" label="confirmation-no"
                                  value="{{$receivingLog->confirmation_no}}"
                    />
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">{{__('update')}}</button>
                </div>
            </div>
        </form>

    </x-content>
@endsection
