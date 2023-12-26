@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Log
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('ActivityLog.index') }}">Log</a></li>
        <li class="breadcrumb-item active" aria-current="page">Log</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('ActivityLog.create') }}">
                        <button type="button" class="btn btn-primary mb-2 text-right">Add Log</button>
                    </a>
                </div>
                <h6 class="card-title">Log Table</h6>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Code</th>
                                 <th class="text-center">Name</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Fax</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($ActivityLog) && !empty($ActivityLog)) 

                            <?php $i = 1; ?>
                            @foreach($ActivityLog as $key => $row)

                            <tr>
                                <td class="text-left">{{$row->campus_code}}</td>
                                <td class="text-left">{{$row->name}}</td>
                                <?php $aadd = App\Models\Address::where('id', $row->address)->first();?>
                                @if(isset($aadd) && !empty($aadd))
                                <td class="text-left">{{ $aadd->name . ', '.$aadd->street . ', ' . $aadd->city . '-' . $aadd->zip . ', ' . $aadd->state . ', ' . $aadd->country}}</td>
                                @else
                                <td class="text-left"></td>
                                @endif
                                <td class="text-left">{{$row->phone_office}}</td>
                                <td class="text-left">{{$row->email}}</td>
                                <td class="text-left">{{$row->fax}}</td>

                                <td style=" text-align: center;"><a href="#" class="btn btn-info profile_details" data-toggle="modal" data-target="#director-profile" data-id="{{ $row->id }}">View</a><a href="{{route('ActivityLog.edit', $row->id)}}" class="btn btn-primary">Edit</a><a href="{{route('ActivityLog.destroy', $row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>

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
                <h2 class="modal-title">Campus Details</h2>
            </div>
            <div class="modal-body">
                <h2>Campus</h2>
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
                                            //url: "{{route('ActivityLog.details', " + profile_id + ")}}",
                                            url: "https://schooloptimizer.golamsoroar.com/school-announcment-details/" + profile_id,
                                            data: {},
                                            success: function (data) {
                                                $("#direct-details").html(data);
                                            }
                                        });
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
