@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Board of Directors
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('staffDirectory.index') }}">Staff Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Staff Directory</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('staffDirectory.create') }}">
                        <button type="button" class="btn btn-primary mb-2 text-right">Add Staff</button>
                    </a>
                </div>
                <h6 class="card-title">Staff Directory Table</h6>
                <div class="table-responsive">
                    @if(isset($staff_directory) && !empty($staff_directory)) 
                    @foreach($staff_directory as $key => $row)
                    <div class="card" style="width: 18rem;">
                        <img src="{{$row->photo}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$row->name}}</h5>
                            <p class="card-text">{{$row->department}}</p>
                            <p class="card-text">{{$row->department}}</p>
                            <a href="#" class="btn btn-primary profile_details" data-toggle="modal" data-target="#director-profile" data-id="{{ $row->id }}">Profile</a>
                        </div>
                    </div>
                    @endforeach
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Profile</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            @foreach($staff_directory as $key => $row)

                            <tr>
                                <td class="text-center"><img src="{{$row->photo}}"></td>
                                <td class="text-center">{{$row->name}}</td>
                                <td class="text-center">{{$row->department}}</td>
                                <td class="text-center"><a class="profile_details" href="#" data-toggle="modal" data-target="#director-profile" data-id="{{ $row->id }}">Profile</a></td>
                                <td class="text-center">{{$row->phone_office}}, {{$row->phone_cell}}</td>

                                <td style=" text-align: center;"><a href="{{route('staffDirectory.edit', $row->id)}}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;<a href="{{route('staffDirectory.destroy', $row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p><strong>Director not found</strong></p>
                    @endif
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
                <h2 class="modal-title">Director's About</h2>
            </div>
            <div class="modal-body">
                <h2>Director's About</h2>
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
                                            //url: "{{route('staffDirectory.details', " + profile_id + ")}}",
                                            url: "https://schooloptimizer.golamsoroar.com/staff-directory-details/" + profile_id,
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
                                    });
</script>
@endpush
