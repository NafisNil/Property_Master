@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Car Mileages</h4>
            <a href="{{route('key-logs.create')}}" class="btn btn-primary">Create</a>
        </x-slot>

        <div>
            <table class="table table-bordered" id="data_table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Key Name</th>
                    <th>Purpose</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </x-content>

    <x-modal.fade id="view_modal"></x-modal.fade>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            let dataTable = $('#data_table').DataTable({
                ajax: '/key-logs',
                columns: [
                    {data: 'date'},
                    {data: 'name'},
                    {data: 'purpose'},
                    {data: 'actions'}
                ]
            })

            $(document).on('click', '.view-item-btn', function () {
                $('#view_modal').load($(this).data('href'), function () {
                    $(this).modal('show');
                })
            })

            $(document).on('click', '.delete-item-btn', function () {
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
                                let {status} = res;
                                if (status === 'success') {
                                    toastr.success(res.message);
                                    dataTable.ajax.reload();
                                }
                            },
                        })
                    }
                })
            })

        })
    </script>
@endpush
