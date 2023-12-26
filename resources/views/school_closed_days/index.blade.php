@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
School Closed Days
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('schoolClosedDays.index') }}">School Closed Days</a></li>
        <li class="breadcrumb-item active" aria-current="page">School Closed Days</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="text-right">
                    <a href="{{ route('schoolClosedDays.create') }}">
                        <button type="button" class="btn btn-primary mb-2 text-right">Add School Closed Days</button>
                    </a>
                </div>
                <h6 class="card-title">School Closed Days Table</h6>
                <div class="table-responsive">


                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Event Name</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($schoolClosedDays) && !empty($schoolClosedDays)) 

                            <?php $i = 1; ?>
                            @foreach($schoolClosedDays as $key => $row)

                            <tr>
                                <td class="text-left">{{$row->date}}</td>
                                <td class="text-left">{{$row->event_name}}</td>
                                <td class="text-left">{{$row->comment}}</td>

                                <td style=" text-align: center;"><a href="{{route('schoolClosedDays.edit', $row->id)}}" class="btn btn-primary">Edit</a><a href="{{route('schoolClosedDays.destroy', $row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>

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

@endsection

@push('js')
<script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/datatable_custom.js') }}"></script>
@endpush
