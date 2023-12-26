@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Date
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Date.index') }}">Date</a></li>
        <li class="breadcrumb-item active" aria-current="page">Date</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('Date.create') }}">
                        <button type="button" class="btn btn-primary mb-2 text-right">Add Date</button>
                    </a>
                </div>
                <h6 class="card-title">Date Table</h6>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Event ID No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">From Date & Time</th>
                                <th class="text-center">To date & Time</th>
                                <th class="text-center">Reminder Method</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($date) && !empty($date))

                            <?php $i = 1; ?>
                            @foreach($date as $key => $row)

                            <tr>
                                <td class="text-left">{{$row->event_id}}</td>

                                <td class="text-left">{{$row->title}}</td>

                                <td class="text-left">{{$row->from_date_time}}</td>

                                <td class="text-left">{{$row->to_date_time}}</td>

                                <?php
                                $reminder_met = '';
                                if($row->reminder_method == 1){
                                    $reminder_met = 'Email';
                                }
                                if($row->reminder_method == 2){
                                    $reminder_met = 'Text Message';
                                }
                                ?>
                                <td class="text-left">{{$reminder_met}}</td>


                                <td style=" text-align: center;"><a href="#" class="btn btn-info profile_details" data-toggle="modal" data-target="#director-profile" data-id="{{ $row->id }}">View</a><a href="{{route('Date.edit', $row->id)}}" class="btn btn-primary">Edit</a><a href="{{route('Date.destroy', $row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="director-profile" role="dialog">
    <div class="modal-dialog" style="max-width: 70%; width: auto !important;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" style="text-indent: 0;">x</button>
                <h2 class="modal-title">Date Details</h2>
            </div>
            <div class="modal-body">
                <h2>Date</h2>
                <div id="direct-details"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/datatable_custom.js') }}"></script>

<script type="text/javascript">
    $(".profile_details").click(function () {
        var profile_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            //url: "{{route('Date.details', " + profile_id + ")}}",
            url: "date-details/" + profile_id,
            data: {},
            success: function (data) {
                $("#direct-details").html(data);
            }
        });
    });
</script>
@endpush
