@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/vendors/toastr/toastr.min.css')}}">
@endpush

@section('page_title')
    Dashboard
@endsection

@section('content')

    <div class="row dash-home">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body" style="min-height: 400px;">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Dashboard</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="dash-right">
                        <div class="card">
                            <h5 class="card-header">Snapshot</h5>
                            <div class="card-body">
                                <!--<h5 class="card-title"></h5>-->
                                <p class="card-text">Snapshot</p>
                            </div>
                        </div>
                    </div>
                    <div class="dash-right">
                        <div class="card">
                            <h5 class="card-header">Upcoming Events</h5>
                            <div class="card-body">
                                <!--<h5 class="card-title"></h5>-->
                                <p class="card-text">Information Session</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection

@push('js')
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/vendors/toastr/toastr.min.js')}}"></script>
    {!! Toastr::message() !!}

@endpush
