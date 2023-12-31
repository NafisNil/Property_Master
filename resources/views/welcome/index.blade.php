@extends('layouts.master')

@section('page_title')
    Welcome Page
@endsection

@section('content')

<x-content>
    <x-slot name="header">
        <h3>Welcome</h3>
        @if ($fileCount <1)
        <a href="{{ route('welcome.create') }}">
            <button type="button" class="btn btn-primary mb-2 text-right">
                <i class="fa fa-plus mr-2"></i>
                Add Welcome Message
            </button>
        </a>
        @endif

    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Welcome Message</h6> 
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Message</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($welcome))

                          

                                <tr>
                                    <td class="text-left">{!! substr($welcome->desc , 0, 120) !!}...
                                        </td>
                                        <td class="text-left">@if ($welcome->status == '0')
                                            <span class="text-danger">Inactive</span>
                                        @else
                                        <span class="text-success">Active</span>
                                        @endif
                                        </td>
                                    <td style=" text-align: center;">
                                        
                                                @if ($welcome->status == '0')
                                                    <a href="{{ route('welcome.active', [$welcome->id]) }}" class="btn btn-sm btn-success">Active</a>
                                                @else
                                                    <a href="{{ route('welcome.active',[$welcome->id]) }}" class="btn btn-sm btn-danger">Inactive</a>
                                                @endif

                                                @if ($welcome->post == '0')
                                                <a href="{{ route('welcome.post',[$welcome->id]) }}" class="btn btn-sm btn-success">Post</a>
                                            @else
                                                <a href="{{ route('welcome.post',[$welcome->id]) }}" class="btn btn-sm btn-danger">Repost</a>
                                            @endif
                                        
                                        <a
                                            href="{{route('welcome.edit', [$welcome])}}"
                                            class="btn btn-primary">Edit</a>
                                        <button
                                            data-href="{{route('welcome.destroy', [$welcome])}}"
                                            class="btn btn-danger delete-account-holder-btn"
                                        >Delete
                                        </button>

                                        {!! Form::open(['url' => route('welcome.destroy', [$welcome]), 'method' => 'delete', 'id'=>'deleteAccountHolderForm']) !!}

                                        {!! Form::close() !!}

                                    </td>

                                </tr>
                           
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
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
            console.log('ddddd');
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
@endsection


