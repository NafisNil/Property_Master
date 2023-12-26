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
                            <h6 class="card-title">Special Needs Education</h6>
                        </div>
                        <div class="portlet-body">
                            <img src="{{ asset('assets/images/profile/under development.png')}}" alt="Under Development" style="width: 100%">
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


