@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('departments')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('Departments.index', ['type' => request()->query('type')]) }}">{{__('departments')}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{__('departments')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('departments')}}</h3>
            <a href="{{ route('Departments.create', ['type' => request()->query('type')]) }}"
               class="btn btn-primary"
            >
                {{__('add-new')}}
            </a>
        </x-slot>

        <div class="table-responsive">
            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Department Name</th>
                    <th class="text-center">Department Head</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $key => $department)

                    <tr>
                        <td class="text-left">{{$department->name}}</td>

                        <td class="text-left">{{$department->head}}</td>

                        <td class="text-left">{{$department->campus->name ?? ''}}</td>

                        <td class="text-left">{{$department->email}}</td>

                        <td class="text-left">{{$department->status}}</td>

                        <td style=" text-align: center;">
                            <a href="#" class="btn btn-info view-item-btn"
                               data-href="{{route('Departments.show', $department->unique_id)}}"
                            >View</a><a
                                href="{{route('Departments.edit', $department->unique_id)}}" class="btn btn-primary">Edit</a><a
                                href="{{route('Departments.destroy', $department->unique_id)}}" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </x-content>

    <x-modal.fade id="view_modal"/>
@endsection

@push('js')

    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.view-item-btn').on('click', function () {
                $('#view_modal').load($(this).data('href'), function () {
                    $(this).modal('show');
                })
            })
        })
    </script>

@endpush
