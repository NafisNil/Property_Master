@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    {{__('memorandum')}}
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Memorandum.index') }}">{{__('memorandum')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('memorandum')}}</li>
        </ol>
    </nav>

    <x-content>
        <x-slot name="header">
            <h3>Memorandum</h3>
            <a href="{{ route('Memorandum.create') }}">
                <button type="button" class="btn btn-primary mb-2 text-right">Add Memorandum</button>
            </a>
        </x-slot>
        <div class="table-responsive">


            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">{{__('memo-no')}}</th>
                    <th class="text-center">{{__('date-and-time')}}</th>
                    <th class="text-center">{{__("priority-level")}}</th>
                    <th class="text-center">{{__('subject')}}</th>
                    <th class="text-center">{{__('status')}}</th>
                    <th class="text-center">{{__('action')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($Memorandum) && !empty($Memorandum))

                        <?php $i = 1; ?>
                    @foreach($Memorandum as $key => $row)

                        <tr>

                            <td class="text-left">{{$row->memo_no}}</td>

                            <td class="text-left">{{$row->date}}</td>

                            <td class="text-left">{{$row->priority_level}}</td>

                            <td class="text-left">{{$row->subject}}</td>

                                <?php
                                $status = 'In-Active';
                                if ($row->status == 1) {
                                    $status = 'Active';
                                }
                                ?>
                            <td class="text-left">{{$status}}</td>

                            <td style=" text-align: center;">
                                <a href="#" class="btn btn-info view-details-btn"
                                   data-href="{{ route("Memorandum.details",$row->id)}}">{{__('view')}}</a>
                                <a href="{{route('Memorandum.edit', $row->id)}}" class="btn btn-primary">{{__('edit')}}</a>
                                <a href="{{route('Memorandum.destroy', $row->id)}}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure you want to Remove?');">{{__('delete')}}</a>
                            </td>

                        </tr>
                            <?php $i++; ?>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </x-content>




    <!-- Modal -->
    <x-modal.fade id="memorandum_view_modal"></x-modal.fade>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/datatable_custom.js') }}"></script>

    <script type="text/javascript">
        $(".view-details-btn").on('click', function () {
            $('#memorandum_view_modal').load($(this).data('href'), function () {
                $(this).modal('show');
            })
        });

        $(document).ready(function () {
            $('#datatable').DataTable({
                "scrollY": "30%",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');

            $("#add-more").click(function (e) {
                alert('kkk');
                // Create clone of <div class='input-form'>
                var newel = $('.ClassroomSeat').clone();

                // Add after last <div class='input-form'>
                $(newel).insertAfter(".ClassroomSeat:last");

            });
        });
    </script>
@endpush
