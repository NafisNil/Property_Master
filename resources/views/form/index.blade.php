@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('form')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Form.index') }}">{{__('form')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('form')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('form')}}</h3>
            <a href="{{ route('Form.create') }}">
                <button type="button" class="btn btn-primary mb-2 text-right">{{__('add-form')}}</button>
            </a>
        </x-slot>
        <div class="table-responsive">


            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">{{__('form-no')}}</th>
                    <th class="text-center">{{__('date-and-time')}}</th>
                    <th class="text-center">{{__('priority-level')}}</th>
                    <th class="text-center">{{__('subject')}}</th>
                    <th class="text-center">{{__('status')}}</th>
                    <th class="text-center">{{__('action')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($Form) && !empty($Form))

                        <?php $i = 1; ?>
                    @foreach($Form as $key => $row)

                        <tr>
                            <td class="text-left">{{$row->form_no}}</td>

                            <td class="text-left">{{$row->date}}</td>

                            <td class="text-left">{{$row->priority_level}}</td>

                            <td>{{$row->subject}}</td>

                                <?php
                                $status = 'In-Active';
                                if ($row->status == 1) {
                                    $status = 'Active';
                                }
                                ?>
                            <td class="text-left">{{$status}}</td>

                            <td style=" text-align: center;"><a href="#"
                                                                class="btn btn-info view-form-btn"
                                                                data-href="{{ route('Form.details', $row->id) }}">{{__('view')}}</a><a
                                    href="{{route('Form.edit', $row->id)}}" class="btn btn-primary">{{__('edit')}}</a><a
                                    href="{{route('Form.destroy', $row->id)}}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to Remove?');">{{__('delete')}}</a>
                            </td>

                        </tr>
                            <?php $i++; ?>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </x-content>



    <!--View Modal Fade -->

    <x-modal.fade id="view_form"/>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">
        $(document).on('click', '.view-form-btn', function () {
            console.log('ccc');
            $('#view_form').load($(this).data('href'), function () {
                $(this).modal('show');
            })
        })
    </script>
@endpush
