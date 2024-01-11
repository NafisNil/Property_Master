@extends('layouts.master')

@section('page_title')
    Complain Type
@endsection

@section('content')

<x-content>
    <x-slot name="header">
        <h3>Complain Type</h3>
        <a href="{{ route('complaintype.create') }}">
            <button type="button" class="btn btn-primary mb-2 text-right">
                <i class="fa fa-plus mr-2"></i>
                Complain Type            </button>
        </a>
    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Complain type List</h6>
                <div class="table-responsive">

                    
                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                         
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($complaintype))

                            @foreach($complaintype as $key => $item)

                                <tr>
                                    <td class="text-left">
                                      
                                        {{$item->name}}</td>
            
                                  
                                    <td style=" text-align: center;">
                               
                                        <a
                                            href="{{route('complaintype.edit', [$item])}}"
                                            class="btn btn-primary">Edit</a>
                                        <button
                                            data-href="{{route('complaintype.destroy', [$item])}}"
                                            class="btn btn-danger delete-account-holder-btn"
                                        >Delete
                                        </button>

                                        {!! Form::open(['url' => route('complaintype.destroy', [$item]), 'method' => 'delete', 'id'=>'deleteAccountHolderForm']) !!}

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


