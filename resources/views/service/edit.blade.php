@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Update Service
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('inventory-items.index') }}">Services</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-sm-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="text-center">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-capitalize">Create Form</h6>
                    <form action="{{ route('services.update', $item->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Service Name*', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Service Name*']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('code', 'Service Code*', ['class' => 'control-label']) !!}
                                    {!! Form::text('code', $item->code, ['class' => 'form-control', 'placeholder' => 'Service Code*']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                {!! Form::label('type_id', 'Service Type*', ['class' => 'control-label']) !!}
                                {!! Form::select('type_id', $serviceTypes, $item->type_id, ['class' => 'form-control', 'placeholder' => 'Select Service Type*']) !!}
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('cost', 'Cost* (Per Hour)', ['class' => 'control-label']) !!}
                                    {!! Form::number('cost', $item->cost, ['class' => 'form-control', 'placeholder' => 'Cost Per Hour']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], $item->status, ['class' => 'form-control', 'placeholder' => 'Status']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('description', '', ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Description']) !!}
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="created_by">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="updated_by">
                                <button type="submit" class="btn btn-primary submit">Submit</button>
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
            $(document).on('change', '#selectAssetType', function () {

                let id = this.value;

                $.ajax({
                    url: `/get-child-asset-types?id=${id}`,
                    success: function (data) {

                        // Transforms the top-level key of the response object from 'items' to 'results'
                        let options = '<option>Select Sub Category</option>';
                        data.map(item => {
                            options += `<option value='${item.id}'>${item.name}</option>`
                        })

                        $('#selectAssetSubType').html(options);

                    },
                    error: function () {

                    }
                })

            })
        });
    </script>
@endpush
