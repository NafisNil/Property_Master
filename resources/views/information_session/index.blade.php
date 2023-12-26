@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Information Session Date
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('informationSession.index') }}">information Session</a></li>
            <li class="breadcrumb-item active" aria-current="page">information Session</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="text-right">
                        <a href="{{ route('informationSession.create') }}">
                            <button type="button" class="btn btn-primary mb-2 text-right">Add Information Session
                            </button>
                        </a>
                    </div>
                    <h6 class="card-title">Information Session Table</h6>
                    <div class="table-responsive">
                        @if(isset($information_session) && !empty($information_session))

                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Date / Time</th>
                                    <th class="text-center">Information</th>
                                    <th class="text-center">Department</th>
                                    <th class="text-center">Location</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                @foreach($information_session as $key => $row)

                                    <tr>
                                        <td class="text-left">{{$row->date}} {{$row->time}}</td>
                                        <td class="text-left">{{$row->information}}</td>
                                            <?php
                                            if ($row->departments):
                                                $deptment = \App\Models\Department::where('id', $row->departments)->first();
                                            else:
                                                $deptment = '';
                                            endif;
                                            ?>
                                        <td class="text-left">{{$deptment->name}}</td>
                                        <td class="text-left">{{$row->location}}</td>
                                        <td class="text-left">{{$row->contact}}</td>

                                        <td style=" text-align: center;"><a href="#"
                                                                            class="btn btn-info profile_details"
                                                                            data-toggle="modal"
                                                                            data-target="#director-profile"
                                                                            data-id="{{ $row->id }}">View</a><a
                                                    href="{{route('informationSession.edit', $row->id)}}"
                                                    class="btn btn-primary">Edit</a><a
                                                    href="{{route('informationSession.destroy', $row->id)}}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to Remove?');">Delete</a>
                                        </td>

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
                    <h2 class="modal-title">Information Session Details</h2>
                </div>
                <div class="modal-body">
                    <h2>Information Session</h2>
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
                //url: "{{route('informationSession.details', " + profile_id + ")}}",
                url: "https://schooloptimizer.golamsoroar.com/information-session-details/" + profile_id,
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
