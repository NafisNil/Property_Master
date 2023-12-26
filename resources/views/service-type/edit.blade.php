@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__("update-service-type")}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('service-types.index') }}">{{__('service-types')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('service-types')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h4>{{__('update-service-type')}}</h4>
        </x-slot>

        <x-form action="{{route('service-types.update', $item->id)}}" method="PUT">

            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="service-type-name"
                        required="true"
                    />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                           name="created_by">
                    <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                           name="updated_by">
                    <button type="submit" class="btn btn-primary submit">{{__('update')}}</button>
                </div>
            </div>
        </x-form>
    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $(document).on('click', '.add-more-btn', function () {
                let lll = $('#expense-table tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;
                let prefix = "reminders[" + index + "]";
                let cloned = $(lll).clone().find('input, select')
                    .each(function (ind, el) {
                        this.name = this.name.replace(/reminders\[\d+]/, prefix);
                        /*if(this.)*/
                        this.value = '';
                    }).end();

                $('#expense-table').append(cloned)
            })


        });
    </script>
@endpush
