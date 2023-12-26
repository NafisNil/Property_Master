@extends('admin.layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Schools</h4>
        </x-slot>
        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schools as $school)
                    <tr>
                        <td>{{$school->name}}</td>
                        <td>{{$school->school_code}}</td>
                        <td>{{$school->email}}</td>
                        <td>{{$school->website}}</td>
                        <td>{{$school->phone}}</td>
                        <td>
                            @if($school->status)
                                <span class="badge badge-primary">Active</span>

                            @else
                                <span class="badge badge-warning">Inactive</span>
                            @endif
                        </td>

                        <td>
                            @if (!$school->status)
                                <button class="btn btn-primary toggle-status-btn" data-status="{{$school->status}}"
                                        data-id="{{$school->id}}"
                                >Make
                                    Active
                                </button>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-content>
@endsection

@push("js")
    <script>
        $(document).ready(function () {
            $('.toggle-status-btn').on('click', function () {

                let currentStatus = $(this).data('status');

                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'post',
                            url: '/admin/schools/' + id + '/toggle-status',
                            success: function (data) {
                                if (data.status === 'success') {
                                    location.reload();
                                }
                            }
                        })
                    }
                })

            })
        })
    </script>
@endpush
