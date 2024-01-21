@extends('layouts.master')

@section('page_title')
    Notice
@endsection

@section('content')

<x-content>
    <x-slot name="header">
        <h3>Notice</h3>
        <a href="{{ route('notice.create') }}">
            <button type="button" class="btn btn-primary mb-2 text-right">
                <i class="fa fa-plus mr-2"></i>
                Add Notice
            </button>
        </a>
    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Notice</h6> - <h6>Total notice : {{ @$fileCount }}</h6> <br>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Title</th>
                            <th class="text-center">Posted By</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($notice))

                            @foreach($notice as $key => $item)

                                <tr>
                                   
                                    <td class="text-left"><a href="{{(!empty($item->pdf))?URL::to('storage/'.$item->pdf):URL::to('image/no_image.png')}}"> {{ $item->title }}</a>
                                       </td>
                                       <td>{{ $item->posted_by }}</td>
                                       <td class="text-left">@if ($item->status == '0')
                                        <span class="text-danger">Inactive</span>
                                    @else
                                    <span class="text-success">Active</span>
                                    @endif
                                    </td>
                                    <td style=" text-align: center;">
                                            
                                        <a
                                            href="{{route('notice.edit', [$item])}}"
                                            class="btn btn-primary">Edit</a>
                                        <button
                                            data-href="{{route('notice.destroy', [$item])}}"
                                            class="btn btn-danger delete-account-holder-btn"
                                        >Delete
                                        </button>

                                        {!! Form::open(['url' => route('notice.destroy', [$item]), 'method' => 'delete', 'id'=>'deleteAccountHolderForm']) !!}

                                        {!! Form::close() !!}


                                        @if (@$item->status == '0')
                                        <a href="{{ route('notice.active', [$item->id]) }}" class="btn btn-sm btn-success">Active</a>
                                    @else
                                        <a href="{{ route('notice.active',[$item->id]) }}" class="btn btn-sm btn-danger">Inactive</a>
                                    @endif

                                    @if (@$item->post == '0')
                                    <a href="{{ route('notice.post',[$item->id]) }}" class="btn btn-sm btn-success">Post</a>
                                @else
                                    <a href="{{ route('notice.post',[$item->id]) }}" class="btn btn-sm btn-danger">Repost</a>
                                @endif

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


