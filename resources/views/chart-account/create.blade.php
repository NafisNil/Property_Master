@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('add-account')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('chart-accounts.index') }}">{{__('accounts')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('accounts')}}</li>
        </ol>
    </nav>

    @include('partials.error-alert', ['errors' => $errors])

    <x-content>
        <x-slot name="header">
            <h3>{{__('add-account')}}</h3>
        </x-slot>

        <form action="{{ route('chart-accounts.store') }}" method="POST" enctype="multipart/form-data"
              class="validate-form"
        >
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="account-name"
                        required="true"
                        data-rules="required"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="account_no"
                        label="account-no"
                        required="true"
                        data-rules="required"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.select
                        name="category_id"
                        label="category"
                        :options="$parentCategories"
                        id="selectParentCategory"
                        :required="true"
                        data-rules="required"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.select
                        name="sub_category_id"
                        label="sub-category"
                        id="selectSubCategory"
                        :options="[]"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="balance"
                        label="opening-balance"
                        data-rules="number"
                    />
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
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('change', '#selectParentCategory', function () {

                let id = this.value;

                $.ajax({
                    url: `/get-child-categories?id=${id}`,
                    success: function (data) {

                        // Transforms the top-level key of the response object from 'items' to 'results'
                        let options = '<option value="">Select Sub Category</option>';
                        data.map(item => {
                            options += `<option value='${item.id}'>${item.name}</option>`
                        })

                        $('#selectSubCategory').html(options);

                    },
                    error: function () {

                    }
                })

            })

        });
    </script>
@endpush
