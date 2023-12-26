@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-locker')}}</h3>
        </x-slot>

        <form action="{{route("lockers.update",$locker->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="locker_no"
                        label="locker-no"
                        value="{{$locker->locker_no}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="storage_id"
                        label="storage"
                        :options="$storages"
                        value="{{$locker->storage_id}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="storage_holder_type"
                        label="storage-holder-type"
                        :options="$storageHolderTypes"
                        value="{{$locker->storage_holder_type}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="dedicated_no"
                        label="dedicated-number"
                        value="{{$locker->dedicated_no}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="location"
                        label="location"
                        value="{{$locker->location}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="vacant"
                        label="vacant"
                        options="[1=>Yes, 0=>No]"
                        value="{{$locker->vacant}}"
                    />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('update')}}</button>
                </div>

            </div>
        </form>

    </x-content>
@endsection
