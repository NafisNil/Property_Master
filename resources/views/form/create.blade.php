@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('add-form')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Form.index') }}">{{__('form')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('form')}}</li>
        </ol>
    </nav>

    @include('partials.error-alert', ['errors' => $errors])

    <div class="row">

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{__('add-new-form')}}</h6>
                    <form action="{{ route('Form.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-4">
                                <x-form.select
                                    name="form_type_id"
                                    label="form-type"
                                    :options="$formTypes"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.input
                                    name="form_no"
                                    label="form-no"
                                    value="{{time()}}"
                                    readonly="true"
                                />
                            </div>
                            <div class="col-sm-4">
                                <x-form.input
                                    name="date"
                                    label="date-and-time"
                                    type="datetime-local"

                                />

                            </div>

                            <div class="col-sm-12">
                                <h4>{{__('from')}}</h4>
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="from_account_type_id"
                                    :options="$userTypes"
                                    label="from-account-type"

                                />
                            </div>
                            <div class="col-sm-4">
                                <x-form.select
                                    name="from_user_id"
                                    :options="[]"
                                    label="from-user"
                                />
                            </div>

                            <div class="col-sm-12">
                                <h4>{{__('to')}}</h4>
                            </div>
                            <div class="col-sm-4">
                                <x-form.select
                                    name="to_account_type_id"
                                    :options="$userTypes"
                                    label="account-type"

                                />
                            </div>
                            <div class="col-sm-4">
                                <x-form.select
                                    name="to_user_id"
                                    :options="[]"
                                    label="to-user"
                                />
                            </div>

                            <div class="col-sm-4">
                                <x-form.select
                                    name="priority_level"
                                    :options="$priorityLevels"
                                    label="priority-level"
                                />
                            </div>

                            <div class="col-sm-12">

                                <x-form.input
                                    name="subject"
                                    label="subject"
                                    placeholder="Subject"

                                />

                            </div>

                            <div class="col-12">
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
                                <input type="hidden" class="form-control" value="{{$school_info->id }}"
                                       name="school_id">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="created_by">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="updated_by">
                                <button type="submit" class="btn btn-primary submit">{{__('submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            //============== From ===============

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


            $("#from_account_type_id").on('change', function () {
                let id = this.value;
                getUser(id, $('#from_user_id'));
            });


            //        ============== To ===============
            $("#to_account_type_id").on('change', function () {
                let id = $(this).val();
                getUser(id, $('#to_user_id'));
            });

        });
    </script>
@endpush
