@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Add Inventory Item
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('inventory-items.index') }}">Inventory Items</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inventory Items</li>
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
                    <form action="{{ route('bank-accounts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Account Name*', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Account Name*']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('account_no', 'Account No*', ['class' => 'control-label']) !!}
                                    {!! Form::text('account_no', '', ['class' => 'form-control', 'placeholder' => 'Account No*']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('balance', 'Opening Balance*', ['class' => 'control-label']) !!}
                                    {!! Form::number('balance', '', ['class' => 'form-control', 'placeholder' => 'Balance']) !!}
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
        $(document).ready(function () {

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
