@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Education Team
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('EducationTeam.index') }}">Education Team</a></li>
        <li class="breadcrumb-item active" aria-current="page">Education Team</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('EducationTeam.create') }}">
                        <button type="button" class="btn btn-primary mb-2 text-right">Add Education Team</button>
                    </a>
                </div>
                <h6 class="card-title">Education Team Table</h6>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>

                                <th class="text-center">Team No</th>
                                <th class="text-center">Creation Date</th>
                                <th class="text-center">Team Group</th>
                                <th class="text-center">Team Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($EducationTeam) && !empty($EducationTeam))

                            <?php $i = 1; ?>
                            @foreach($EducationTeam as $key => $row)

                            <tr>

                                <td class="text-left">{{$row->team_no}}</td>

                                <td class="text-left">{{$row->creation_date}}</td>

                                <?php $team_group = \App\Models\TeamGroup::where('id', $row->team_group)->first(); ?>
                                <td class="text-left">{{$team_group->name ?? ''}}</td>

                                <?php $team_type = \App\Models\TeamType::where('id', $row->team_type)->first(); ?>
                                <td class="text-left">{{$team_type->name ?? ''}}</td>

                                <?php $status = 'In-Active'; if ($row->status == 1) { $status = 'Active'; } ?>
                                <td class="text-left">{{$status}}</td>

                                <td style=" text-align: center;"><a href="#" class="btn btn-info profile_details" data-toggle="modal" data-target="#director-profile" data-id="{{ $row->id }}">View</a><a href="{{route('EducationTeam.edit', $row->id)}}" class="btn btn-primary">Edit</a><a href="{{route('EducationTeam.destroy', $row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>

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
                <h2 class="modal-title">Education Team Details</h2>
            </div>
            <div class="modal-body">
                <h2>Education Team</h2>
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
        //url: "{{route('EducationTeam.details', " + profile_id + ")}}",
        url: "education-team-details/" + profile_id,
        data: {},
        success: function (data) {
            $("#direct-details").html(data);
        }
    });
});
</script>
@endpush
