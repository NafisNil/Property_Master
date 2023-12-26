@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('fee-and-charges')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('fees-and-charges.index') }}">{{__('fee-and-charges')}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{__('fee-and-charges')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>{{__('fee-and-charges')}}</h3>
            <a href="{{ route('fees-and-charges.create') }}" class="btn btn-primary">{{__('add-new')}}</a>
        </x-slot>

        <div class="table-responsive">
            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Category</th>
                    <th>Program</th>
                    <th>Grade/Year</th>
                    <th class="text-center">Fee (Domestic)</th>
                    <th class="text-center">Fee (International)</th>
                    <th class="text-center">Fee (Special needs)</th>
                    <th class="text-center">Refundable</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($feesAndCharges) && !empty($feesAndCharges))

                        <?php $i = 1; ?>
                    @foreach($feesAndCharges as $key => $row)

                        <tr>
                            <td class="text-left">{{$row->category->name ?? ''}}</td>
                            <td>{{$row->program->program_name ?? ''}}</td>
                            <td>{{$row->gradeYear->program_name ?? ''}}</td>
                            <td class="text-left">{{$row->fee_domestic}}</td>
                            <td class="text-left">{{$row->fee_international}}</td>
                            <td class="text-left">{{$row->fee_special_needs}}</td>
                                <?php
                                $ref = 'No';
                                if (isset($row->refundable) && $row->refundable == 1) {
                                    $ref = 'Yes';
                                }
                                ?>
                            <td class="text-left">{{$ref}}</td>

                                <?php
                                $status = 'In-Active';
                                if (isset($row->status) && $row->status == 1) {
                                    $status = 'Active';
                                }
                                ?>
                            <td class="text-left">{{$status}}</td>

                            <td style=" text-align: center;">
                                <button
                                    class="btn btn-info view-item"
                                    data-href="{{route('fees-and-charges.show', $row->id)}}">View
                                </button>
                                <a
                                    href="{{route('fees-and-charges.edit', $row->id)}}"
                                    class="btn btn-primary">Edit</a><a
                                    href="{{route('fees-and-charges.destroy', $row->id)}}"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to Remove?');">Delete</a>
                            </td>

                        </tr>
                            <?php $i++; ?>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </x-content>

    <x-modal.fade id="view_modal"></x-modal.fade>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script
        src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable').DataTable({
                "scrollY": "30%",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');
        });

        $(document).on('click', '.view-item', function () {
            let url = $(this).data('href');
            $("#view_modal").load(url, function () {
                $(this).modal('show')
            })
        })

    </script>
@endpush
