@extends('layouts.master')

@section('page_title')
    Newfile
@endsection

@section('content')

<x-content>
    <x-slot name="header">
        <h3>Newfile</h3>
        <a href="{{ route('newfile.create') }}">
            <button type="button" class="btn btn-primary mb-2 text-right">
                <i class="fa fa-plus mr-2"></i>
                Add Newfile
            </button>
        </a>
    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">New file</h6> - <h6>Total Files : {{ @$fileCount }}</h6> <br>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">File No</th>
                            <th class="text-center">Fiscal Year</th>
                            <th class="text-center">Last Modification</th>
                            <th class="text-center">Last User</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($newfile))

                            @foreach($newfile as $key => $item)

                                <tr>
                                    <td class="text-left">
                                        @php
                                            $company = App\Models\Company::where('id', $item->company)->first();
                                        @endphp
                                        {{$company->name}}</td>
                                    <td class="text-left">{{$item->file_no}}</td>
                                    <td class="text-left">{{$item->fiscal_year}}</td>
                                    <td class="text-left">{{$item->updated_at->format('d M, Y')}}</td>
                                    <td class="text-left">
                                        @php
                                            $user = App\Models\User::where('id', $item->last_user)->first();
                                        @endphp
                                        {{ $user->user_name }}
                                    </td>
                                    <td style=" text-align: center;">
                                        <button
                                            class="btn btn-info view-account-holder-btn"
                                            data-href="{{route('newfile.show', [$item])}}">View
                                        </button>
                                        <a
                                            href="{{route('newfile.edit', [$item])}}"
                                            class="btn btn-primary">Edit</a>
                                        <button
                                            data-href="{{route('newfile.destroy', [$item])}}"
                                            class="btn btn-danger delete-account-holder-btn"
                                        >Delete
                                        </button>

                                        {!! Form::open(['url' => route('newfile.destroy', [$item]), 'method' => 'delete', 'id'=>'deleteAccountHolderForm']) !!}

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


