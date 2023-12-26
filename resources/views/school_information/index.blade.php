@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastr/toastr.min.css')}}">
@endpush

@section('page_title')
    {{$type}}
@endsection

@section('content')
    <div class="mt-bootstrap-tables">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="padding: 0!important;">
                    <div class="portlet light bordered" style="padding-top: 15px;">
                        <div class="col-md-12">
                            <h2 class="card-title">{{$type}} Information</h2>
                        </div>
                        <div class="portlet-body col-md-12" style="padding: 30px 15px;" id="information_box">
                            <p>
                                {{$info->content ?? 'No Information Found'}}
                            </p>
                            <p class="text-right">
                                <button class="btn btn-primary btn-lg btn-edit-information">Edit</button>
                            </p>

                        </div>

                        <div class="card-body d-none" id="information_form">
                            {!! Form::open(['url' => route('information.store')]) !!}
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! Form::label('content', "Information", ['class' => 'control-label']) !!}
                                    {!! Form::textarea('content', $info->content ?? '', ['class' => 'form-control', 'rows' => 4]) !!}
                                </div>
                                <div class="col-sm-12 mt-2 d-flex justify-content-end">
                                    <input type="hidden" name="type" value="{{$type}}">
                                    <input type="hidden" name="id" value="{{$info->id ?? ''}}">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            //information button
            $('.btn-edit-information').on('click', function (e) {
                $('#information_box').addClass('d-none');
                $('#information_form').removeClass('d-none');
            })
        });
    </script>
@endpush


