@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Students
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('account-holders.index', ['type' => request()->query('type')]) }}">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account Holders</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('students.create') }}">
                            <button type="button" class="btn btn-primary mb-2 text-right">
                                <i class="fa fa-plus mr-2"></i>
                                Add Student
                            </button>
                        </a>
                    </div>
                    <h6 class="card-title">Students Table</h6>
                    <div class="table-responsive">


                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Middle Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Education</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($accountHolders) && !empty($accountHolders))

                                @foreach($accountHolders as $key => $row)

                                    <tr>
                                        <td class="text-left">{{$row->first_name}}</td>
                                        <td class="text-left">{{$row->middle_name}}</td>
                                        <td class="text-left">{{$row->last_name}}</td>
                                        <td class="text-left">{{$row->education}}</td>
                                        <td style=" text-align: center;">
                                            <button
                                                class="btn btn-info view-account-holder-btn"
                                                data-href="{{route('students.show', $row->id)}}">View
                                            </button>
                                            <a
                                                href="{{route('students.edit', $row->id)}}"
                                                class="btn btn-primary">Edit</a>
                                            <button
                                                data-href="{{route('students.destroy', $row->id)}}"
                                                class="btn btn-danger delete-account-holder-btn"
                                            >Delete
                                            </button>

                                            {!! Form::open(['url' => route('students.destroy', $row->id), 'method' => 'delete', 'id'=>'deleteAccountHolderForm']) !!}

                                            {!! Form::close() !!}

                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <x-modal.fade id="viewAccountHolder"/>
    <!--    <div class="modal fade" id="viewAccountHolder" tabindex="-1" aria-hidden="true">
        </div>-->

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable').DataTable({
                "scrollY": "30%",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');
        });

        $(document).on('click', '.view-account-holder-btn', function () {
            $('#viewAccountHolder').load($(this).data('href'), function () {
                $(this).modal('show');
            })
        })

        $(document).on('click', '.delete-account-holder-btn', function () {
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
                $('#deleteAccountHolderForm').submit();
            })
        });

    </script>
@endpush
