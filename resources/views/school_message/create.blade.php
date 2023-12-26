@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('add-school-message')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SchoolMessage.index') }}">School Message</a></li>
            <li class="breadcrumb-item active" aria-current="page">School Message</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('add-new-message')}}</h3>
        </x-slot>
        <form action="{{ route('SchoolMessage.store') }}"
              method="POST" enctype="multipart/form-data"
              class="validate-form"
        >
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <x-form.input
                        name="message_no"
                        label="message-no"
                        :required="true"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="message_date"
                        label="date"
                        type="datetime-local"
                        :required="true"
                    />
                </div>

                <div class="col-sm-12">
                    <h4 class="my-1">From</h4>
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="from_user_type_id"
                        label="from-user-type"
                        :options="$userTypes"
                        :required="true"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        :options="[]"
                        name="from_user_id"
                        label="from-user"
                        :required="true"
                    />
                </div>

                <div class="col-sm-12 my-1">
                    <h3>{{__('to')}}</h3>
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="to_user_type_id"
                        label="to-user-type"
                        :options="$userTypes"
                        :required="true"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="to_user_id"
                        label="to-user"
                        :options="[]"
                        :required="true"
                    />
                </div>

                <div class="col-sm-12 my-1">
                    <h4>CC</h4></div>
                <div class="col-sm-4">
                    <x-form.select
                        name="cc_user_type_id"
                        label="cc-user-type"
                        :options="$userTypes"
                        :required="true"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.select
                        name="cc_user_id"
                        label="cc-user"
                        :options="[]"
                        :required="true"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="priority_level"
                        label="priority-level"
                        :options="$priorityLevels"
                        :required="true"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="subject"
                        label="subject"
                        :required="true"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="re"
                        label="re"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.textarea
                        name="message"
                        label="message"
                    />
                </div>
                <div class="col-sm-4">
                    @include('partials.active-status')
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary submit">{{__('submit')}}</button>
                </div>
            </div>
        </form>
    </x-content>

@endsection

@push('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            function getUser(id, dependantId) {
                $.ajax({
                    url: '/get-account-holders?account_holder_type_id=' + id,
                    success: function (data) {
                        let html = "<option value=''>Select Account Holder</option>";
                        $.each(data, function (index, item) {
                            html += `<option value='${item.id}'>${item.full_name}</option>`;
                        })
                        $(dependantId).html(html);
                    }
                })
            }

            $('#from_user_type_id').on('change', function () {
                let value = this.value;
                getUser(value, '#from_user_id');
            })

            $('#to_user_type_id').on('change', function () {
                let value = this.value;
                getUser(value, '#to_user_id');
            })

            $('#cc_user_type_id').on('change', function () {
                let value = this.value;
                getUser(value, '#cc_user_id');
            })


        });
    </script>
@endpush
