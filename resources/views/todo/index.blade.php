@extends('layouts.master')

@section('page_title')
    TodoList
@endsection

@section('content')

<x-content>
    <x-slot name="header">
        <h3>TodoList</h3>
        <a href="{{ route('todo.create') }}">
            <button type="button" class="btn btn-primary mb-2 text-right">
                <i class="fa fa-plus mr-2"></i>
                Add TodoList
            </button>
        </a>
    </x-slot>
</x-content>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Todo List</h6> - <h6>Total list : {{ @$fileCount }}</h6> <br>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                        <tr>
                          
                            <th class="text-center">Assigned By</th>
                            <th class="text-center">Objectives</th>
                            <th class="text-center">Person</th>
                            <th class="text-center">Contact Person Name</th>
                            <th class="text-center">Contact Person Office</th>
                            <th class="text-center">Contact Person Cellphone</th>
                            <th class="text-center">Contact Person Email</th>
                            <th class="text-center">Priority</th>
                            <th class="text-center">Deadline</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($todo))

                            @foreach($todo as $key => $item)

                                <tr>
                                  
                                    <td class="text-left">
                                        {{ $item->assigned_by }}</td>
                                        <td class="text-left">{!!$item->objectives!!}</td>
                                        <td class="text-left">{{$item->person}}</td>
                                    <td class="text-left">{{$item->ch_name}}</td>
                                    <td class="text-left">{!!$item->ch_office!!}</td>
                                    <td class="text-left"> <a href="tel:{{ $item->ch_cellphone }}">{{$item->ch_cellphone}}</a> </td>
                                    <td class="text-left"> <a href="mailto:{{ $item->ch_email }}">{{$item->ch_email}}</a> </td>
                                    <td class="text-left">
                                        @if ($item->priority=='High')
                                            <span style="color: brown">{{ $item->priority }}</span>
                                        @elseif($item->priority=='Medium')
                                        <span style="color: yellow">{{ $item->priority }}</span>
                                        @else
                                        <span style="color: green">{{ $item->priority }}</span>
                                        @endif
                                    </td>
                                    <td class="text-left">{{$item->deadline}}</td>
                                    <td class="text-left">{!! $item->location!!}</td>
                                  
                                    <td class="text-left">@if ($item->status == '0')
                                        <span class="text-danger">Inactive</span>
                                    @else
                                    <span class="text-success">Active</span>
                                    @endif
                                    </td>
                                    <td style=" text-align: center;">
                                        <a
                                            href="{{route('todo.show', [$item])}}"
                                            class="btn btn-info">View</a>
                                            
                    
                                        <a
                                            href="{{route('todo.edit', [$item])}}"
                                            class="btn btn-primary">Edit</a>
                                        <button
                                            data-href="{{route('todo.destroy', [$item])}}"
                                            class="btn btn-danger delete-account-holder-btn"
                                        >Delete
                                        </button>

                                        {!! Form::open(['url' => route('todo.destroy', [$item]), 'method' => 'delete', 'id'=>'deleteAccountHolderForm']) !!}

                                        {!! Form::close() !!}


                                        @if (@$item->status == '0')
                                        <a href="{{ route('todo.active', [$item->id]) }}" class="btn btn-sm btn-success">Active</a>
                                    @else
                                        <a href="{{ route('todo.active',[$item->id]) }}" class="btn btn-sm btn-danger">Inactive</a>
                                    @endif

                                    @if (@$item->post == '0')
                                    <a href="{{ route('todo.post',[$item->id]) }}" class="btn btn-sm btn-success">Post</a>
                                @else
                                    <a href="{{ route('todo.post',[$item->id]) }}" class="btn btn-sm btn-danger">Repost</a>
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


