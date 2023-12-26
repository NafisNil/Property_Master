@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-locker')}}</h3>
        </x-slot>

        <form action="{{route("lockers.store")}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="locker_no"
                        label="locker-no"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="storage_id"
                        label="storage"
                        :options="$storages"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="storage_holder_type"
                        label="storage-holder-type"
                        :options="$storageHolderTypes"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="dedicated_no"
                        label="dedicated-number"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="location"
                        label="location"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="vacant"
                        label="vacant"
                        options="[1=>Yes, 0=>No]"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>
        </form>

    </x-content>
@endsection
