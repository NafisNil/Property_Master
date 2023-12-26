@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Assignment
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('assessments.index') }}">Assignment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Assignment</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('service-providers.create') }}">
                            <button type="button" class="btn btn-primary mb-2 text-right">Add Service Provider</button>
                        </a>
                    </div>
                    <h6 class="card-title">Service Providers Table</h6>
                    <div class="table-responsive">


                        <table id="service-providers-table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Providers Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Contact Person</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="viewServiceProviderModal" tabindex="-1" aria-hidden="true">
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            let dataTable = $('#service-providers-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: '/service-providers',
                columns: [
                    {data: 'name'},
                    {data: 'phone'},
                    {data: 'email'},
                    {data: 'contact_person_name'},
                    {data: 'actions'}
                ]
            })

            $(document).on('click', '.view-service-provider-btn', function () {
                $('#viewServiceProviderModal').load($(this).data('href'), function (result) {
                    $(this).modal('show');
                })
            });

            $(document).on('click', '.delete-service-provider-btn', function () {
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
