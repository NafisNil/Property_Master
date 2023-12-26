@extends('layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h3>{{__('lockers')}}</h3>
            <a href="{{route('lockers.create')}}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div class="table-responsive">
            <table class="table table-bordered" id="locker_table">
                <thead>
                <tr>
                    <th>{{__('locker-no')}}</th>
                    <th>{{__('dedicated-no')}}</th>
                    <th>{{__('storage')}}</th>
                    <th>{{__('storage-holder-type')}}</th>
                    <th>{{__('location')}}</th>
                    <th>{{__('vacant')}}</th>
                    <th>{{__('action')}}</th>
                </tr>
                </thead>
            </table>
        </div>

    </x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#locker_table').DataTable({
                ajax: window.location.pathname,
                columns: [
                    {
                        data: 'locker_no'
                    },
                    {
                        data: 'dedicated_no',
                    }, {
                        data: 'storage.storage_name'
                    },
                    {
                        data: 'storage_holder_type'
                    },
                    {
                        data: 'location',
                    },
                    {
                        data: 'vacant'
                    },
                    {
                        data: 'action',
                    }
                ]
            })
        })
    </script>
@endpush
