@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('update-accounts')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('chart-accounts.index') }}">{{__('accounts')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('accounts')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('update-account')}}</h3>
        </x-slot>

        <x-form action="{{route('chart-accounts.update', $item->id)}}"
                method="PUT"
        >

            <div class="row">
                <div class="col-sm-6">
                    <x-form.input
                        name="name"
                        label="account-name"
                        required="true"
                        value="{{$item->name}}"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.input
                        name="account_no"
                        label="account-no"
                        required="true"
                        value="{{$item->account_no}}"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.select
                        name="category_id"
                        label="category"
                        :options="$parentCategories"
                        id="selectParentCategory"
                        value="{{$item->category_id}}"
                    />
                </div>
                <div class="col-sm-6">
                    <x-form.select
                        name="sub_category_id"
                        label="sub-category"
                        id="selectSubCategory"
                        :options="$subCategories"
                        value="{{$item->sub_category_id}}"
                    />
                </div>


            </div>

            <div class="row mt-2">
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


            $(document).on('change', '#selectParentCategory', function () {

                let id = this.value;

                $.ajax({
                    url: `/get-child-categories?id=${id}`,
                    success: function (data) {

                        // Transforms the top-level key of the response object from 'items' to 'results'
                        let options = '<option>Select Sub Category</option>';
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
