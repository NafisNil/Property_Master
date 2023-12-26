@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastr/toastr.min.css')}}">
@endpush

@section('page_title')
    User Manager
@endsection

@section('content')
<div class="mt-bootstrap-tables">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" style="padding: 0!important;">
                    <div class="portlet light bordered" style="padding-top: 15px;">
                        <div class="col-md-12">
                            <h2 class="card-title">Welcome Messages</h2>
                        </div>
                        <div class="portlet-body col-md-12" style="padding: 30px 15px;">
                            @if(isset($school_info->welcome) && !empty($school_info->welcome))
                            <p>{{$school_info->welcome}}</p>
                            @else
                            <p>Welcome message not foud</p>
                            @endif
                            
                            <p class="text-right"><a href="{{route('messages.messageEdit', $school_info->id)}}"><button class="btn btn-primary btn-lg">Edit</button></a></p>
                            
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


