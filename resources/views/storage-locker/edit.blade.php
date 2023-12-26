@extends('layouts.master')

@section('content')

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h3>{{__('storage-lockers')}}</h3>
        </x-slot>
        <form action="{{route('storage-lockers.update', $storageLocker->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="storage_no"
                        label="storage-number"
                        value="{{$storageLocker->storage_no}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="storage_name"
                        label="storage-name"
                        value="{{$storageLocker->storage_name}}"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="total_lockers"
                        label="total-lockers"
                        value="{{$storageLocker->total_lockers}}"
                    />
                </div>
                <div class="col-12">
                    <h3>Contact</h3>
                </div>

                @include('partials.contact', ['prefix' => 'contact', 'contact' => $storageLocker->contact])

                <div class="col-12">
                    <h3>Address</h3>
                </div>
                @include('partials.address', ['address' => $storageLocker->address])

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('submit')}}</button>
                </div>

            </div>

        </form>
    </x-content>
@endsection
