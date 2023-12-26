@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('update-department')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Departments.create') }}">{{__('departments')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('departments')}}</li>
        </ol>
    </nav>

    @include('partials.error-alert', ['errors' => $errors])

    <form class="validate-form" action="{{ route('Departments.update', $department->unique_id) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <x-form.input
                    name="name"
                    label="department-name"
                    :required="true"
                    data-rules="required|alpha"
                    value="{{$department->name}}"
                />
            </div>

            <div class="col-sm-4">
                <x-form.select
                    name="type"
                    label="type"
                    :options="$departmentTypes"
                    data-rules="required"
                    value="{{$department->type}}"
                />
            </div>

            <div class="col-sm-4">
                <x-form.input
                    name="head"
                    label="department-head"
                    data-rules="required|alpha"
                    value="{{$department->head}}"
                />
            </div>
            <div class="col-sm-4">
                <x-form.select
                    name="campus_id"
                    label="campus"
                    :options="$campuses"
                    :required="true"
                    data-rules="required"
                    value="{{$department->campus_id}}"
                />
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-3">
                    <label for="phone" class="form-label">Phone</label><br/>
                    <input type="tel" class="form-control" id="edudep_phone_office" style="border-radius: 5px 0 0 5px;"
                           name="phone"
                           value="{{$department->phone}}"
                    >
                    <span class="input-group-addon"
                          style="padding: 10px 20px; background: #ced4da; border-radius: 0 5px 5px 0; margin-left: -5px;">Tel</span>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="valid-feedback"></div>
                </div>
            </div>

            <div class="col-sm-4">
                <x-form.input
                    name="email"
                    label="email"
                    :required="true"
                    data-rules="required|email"
                    value="{{$department->email}}"
                />
            </div>

            <div class="col-sm-4">
                <x-form.input
                    name="operation_hour"
                    label="operation-hour"
                    data-rules="number"
                    value="{{$department->operation_hour}}"
                />
            </div>
            <div class="col-sm-4">
                @include('partials.active-status', ['status' => $department->status])
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary submit">{{__('submit')}}</button>
            </div>
        </div>
    </form>

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
    <script src="{{ asset('assets/js/countrystatecity.js')}}"></script>
    <script type="text/javascript">
        $("#phone").intlTelInput({
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });

        $('from').validate({
            rules: {
                name: ['required', 'alpha']
            }
        })

    </script>

@endpush
