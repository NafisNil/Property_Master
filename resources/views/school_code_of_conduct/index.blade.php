@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastr/toastr.min.css')}}">
@endpush

@section('page_title')
    Code of Conduct {{$school_info->name}}
@endsection

@section('content')
    <div class="mt-bootstrap-tables">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="padding: 0!important;">
                    <div class="portlet light bordered" style="padding-top: 15px;">
                        <div class="col-md-12">
                            <h2 class="card-title">Code of Conduct {{$school_info->name}}</h2>
                        </div>
                        <div class="portlet-body col-md-12" style="padding: 30px 15px;">
                            @if(!empty($school_info->code_of_conduct))
                                <p>{{$school_info->code_of_conduct}}</p>
                            @else
                                <p>School Information not found</p>
                            @endif

                            <p class="text-right"><a href="{{route('SchoolCodeOfConduct.messageEdit', $school_info->id)}}"><button class="btn btn-primary btn-lg">Edit</button></a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#benefTable').DataTable({
                "scrollY": "30%",
                "scrollCollapse": true,
            });
//        $('.dataTables_length').addClass('bs-select');
        });
        //    $('#approveModalCenter').on('show.bs.modal', function (e) {
        //        $(this).find('.app-buitton').attr('href', $(e.relatedTarget).data('href'));
        //    });

    </script>
@endsection


