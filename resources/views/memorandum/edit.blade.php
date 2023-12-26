@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('update-memorandum')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Memorandum.index') }}">{{__('memorandum')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('memorandum')}}</li>
        </ol>
    </nav>

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h3>{{__('update-memorandum')}}</h3>
        </x-slot>

        <form action="{{ route('Memorandum.update', $memo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-sm-4">
                    <x-form.input
                        name="memo_no"
                        label="memo-no"
                        value="{{$memo->memo_no}}"
                        readonly="true"
                    />
                </div>
                <div class="col-sm-4">
                    <x-form.input
                        name="date"
                        label="date-and-time"
                        type="datetime-local"
                        value="{{$memo->date}}"

                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="priority_level"
                        :options="$priorityLevels"
                        label="priority-level"
                        value="{{$memo->priority_level}}"
                    />
                </div>

                <div class="col-sm-12">
                    <h4>{{__('from')}}</h4>
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="from_department_id"
                        label="department"
                        :options="$departments"
                        value="{{$memo->from->department_id ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="from_section"
                        label="section"
                        value="{{$memo->from->section ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="from_position"
                        label="position"
                        value="{{$memo->from->position ?? ''}}"
                    />
                </div>


                <div class="col-sm-4">
                    <x-form.select
                        name="from_user_id"
                        label="User"
                        :options="$users"
                        value="{{$memo->from->user_id ?? ''}}"

                    />
                </div>

                <div class="col-sm-12">
                    <h4>{{__('to')}}</h4>
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="to_department_id"
                        label="department"
                        :options="$departments"
                        value="{{$memo->to->department_id ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="to_section"
                        label="section"
                        value="{{$memo->to->section ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="to_position"
                        label="position"
                        value="{{$memo->to->position ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="to_user_id"
                        label="User"
                        :options="$users"
                        value="{{$memo->to->user_id ?? ''}}"

                    />
                </div>

                <div class="col-12">
                    <h3>{{__('add-recipient')}}</h3>
                </div>

                <div class="col-12">
                    <table class="col-12">
                        <thead>
                        <tr>
                            <th>{{__('department')}}</th>
                            <th>{{__('section')}}</th>
                            <th>{{__('position')}}</th>
                            <th>{{__('user')}}</th>
                            <th>
                                <button type="button" id="add_more_recipient">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memo->recipients as $index=>$recipient)
                            @include('memorandum.recipient-row', ['index' => $index, 'recipient' => $recipient])
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-12">
                    <h4>CC</h4>
                </div>

                <div class="col-sm-4">
                    <x-form.select
                        name="cc_department_id"
                        label="department"
                        :options="$departments"
                        value="{{$memo->cc->department_id ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="cc_section"
                        label="section"
                        value="{{$memo->cc->section ?? ''}}"
                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="cc_position"
                        label="position"
                        value="{{$memo->cc->position ?? ''}}"
                    />
                </div>


                <div class="col-sm-4">
                    <x-form.select
                        name="cc_user_id"
                        label="User"
                        :options="$users"
                        value="{{$memo->cc->user_id ?? ''}}"

                    />
                </div>

                <div class="col-sm-4">
                    <x-form.input
                        name="action_date"
                        label="action-date"
                        type="datetime-local"
                        value="{{$memo->action_date}}"
                    />
                </div>

                <div class="col-sm-12">

                    <x-form.input
                        name="subject"
                        label="subject"
                        value="{{$memo->subject}}"
                    />

                </div>

                <div class="col-12">
                    <x-form.textarea
                        name="message"
                        label="message"
                        value="{{$memo->message}}"

                    />
                </div>
                <div class="col-sm-4">
                    @include('partials.active-status', ['status' => $memo->status])
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary submit">{{__('update')}}</button>
                </div>
            </div>
        </form>
    </x-content>

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

            $('#cc_account_type_id').on('change', function () {
                let id = this.value;
                getUser(id, $('#cc_user_id'))
            })


            //        ============== To ===============
            $("#to_account_type_id").on('change', function () {
                let id = $(this).val();
                getUser(id, $('#to_user_id'));
            });

            $('#add_more_recipient').on('click', function () {

                console.log('click');

                let table = $(this).closest('table');
                let lll = $(table).find('tbody>tr:last')
                let index = Number($(lll).find('input[name=index]').val()) + 1;

                let prefix = "recipients[" + index + "]";

                console.log({prefix})

                let cloned = $(lll).clone().find('input, select')
                    .each(function () {
                        if (this.name !== 'index') {
                            this.name = this.name.replace(/recipients\[\d+]/, prefix);
                            this.value = '';
                        } else {
                            this.value = index;
                        }
                    }).end();

                $(table).append(cloned)
            })

        });
    </script>
@endpush
