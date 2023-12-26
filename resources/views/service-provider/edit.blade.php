@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Update Service Provider
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Assignment.index') }}">Assignment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignment</li>
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
                    <h6 class="card-title text-capitalize">Update Form</h6>
                    <form action="{{ route('service-providers.update',$serviceProvider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Service Provider's Name</label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{$serviceProvider->name}}"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phone*</label>
                                    <input class="form-control" type="text" name="phone"
                                           value="{{$serviceProvider->phone}}"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input class="form-control" type="text"
                                           value="{{$serviceProvider->email}}"
                                           name="email" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Contact Person</label>
                                    <input class="form-control"
                                           value="{{$serviceProvider->contact_person_name}}"
                                           type="text" name="contact_person_name" required>
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
