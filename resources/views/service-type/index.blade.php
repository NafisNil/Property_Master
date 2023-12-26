@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('service-types')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('service-types.index') }}">{{__('service-types')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('service-types')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('service-types')}}</h3>
            <a href="{{ route('service-types.create') }}">
                <button type="button" class="btn btn-primary mb-2 text-right">{{__('add-service-type')}}</button>
            </a>
        </x-slot>

        <div class="table-responsive">
            <table id="inventory-items-table" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">{{__('name')}}</th>
                    <th class="text-center">{{__('action')}}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </x-content>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            let dataTable = $('#inventory-items-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: '/service-types',
                //note: yajra try to sort using first column
                //so never use a relationship instance in first column
                columns: [
                    {data: 'name'},
                    {data: 'actions'}
                ]
            })

            $(document).on('click', '.delete-inventory-item-btn', function () {
                let url = $(this).data('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#4e90bd',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'delete',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (res) {
                                console.log("deleted", res);
                                toastr.success(res.message);
                                dataTable.ajax.reload();
                            },
                            error: function (er) {
                                console.log(er)
                            }
                        });

                    }
                })
            });

        })

    </script>
@endpush
