@extends('layouts.master')

@section('content')



    <x-content>
        <x-slot name="header">
            <h4>{{__('mark-appeals')}}</h4>
            <a href="{{route("mark-appeals.create")}}" class="btn btn-primary">{{__('add-appeal')}}</a>
        </x-slot>

        <div>
            <div>
                <table class="table table-bordered" id="mark_appeals_table">
                    <thead>
                        <tr>
                            <th>{{__('file-no')}}.</th>
                            <th>{{__("from-student")}}</th>
                            <th>{{__('to-teacher')}}</th>
                            <th>{{__('subject-course')}}</th>
                            <th>{{__('semester')}}</th>
                            <th>{{__('received-mark')}}</th>
                            <th>{{__('status')}}</th>
                            <th>{{__('actions')}}</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>

    </x-content>
@endsection

@push('js')

    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            let table = $('#mark_appeals_table').DataTable({
                ajax: '/mark-appeals',
                columns: [
                    {data: 'file_no'},
                    {data: 'from_student'},
                    {data: 'to_teacher'},
                    {data: 'course'},
                    {data: 'semester'},
                    {data: 'received_mark'},
                    {data: 'status'},
                    {data: 'actions'},
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
                                console.log("deleted", res);
                                toastr.success(res.message);
                                table.ajax.reload();
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
