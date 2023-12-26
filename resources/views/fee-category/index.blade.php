@extends('layouts.master')

@section('content')
    <x-content>
        <x-slot name="header">
            <h3>Fee Categories</h3>
            <a href="{{route('fee-categories.create')}}">Create</a>
        </x-slot>
        <div>
            <table id="fee_categories_table" class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </x-content>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {

            let dataTable = $('#fee_categories_table').DataTable({
                ajax: window.location.pathname,
                columns: [
                    {data: 'name'},
                    {data: 'parent.name', defaultContent: ''},
                    {data: 'status'},
                    {data: 'action'}
                ]
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
                                if(res.status === 'success') {
                                    toastr.success(res.message);
                                    dataTable.ajax.reload();
                                }
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
