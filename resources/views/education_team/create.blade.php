@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Add Education Team
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('EducationTeam.index') }}">Education Team</a></li>
        <li class="breadcrumb-item active" aria-current="page">Education Team</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="text-center">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Education Team Create Form</h6>
                <form action="{{ route('EducationTeam.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="team_no" class="form-label">Team No</label>
                                <input type="text" class="form-control" placeholder="" name="team_no" value="{{ time() }}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="creation_date" class="form-label">Creation Date</label>
                                <input type="datetime-local" class="form-control" value="" name="creation_date" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Net Operating Days</label>
                                <input type="text" class="form-control" value="" name="net_operating_days" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Current Status</label>
                                <select class="form-control mb-3" name="current_status" required>
                                    <option value="">---Select One---</option>
                                    <option value="In-Processes ">In-Processes </option>
                                    <option value="Canceled">Canceled</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Team Group</label>
                                <?php $team_group = App\Models\TeamGroup::where('status', 1)->pluck('name', 'id'); ?>
                                <select class="form-control mb-3" name="team_group" required>
                                    <option value="">---Select One---</option>
                                    @foreach($team_group as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Goal(s)</label>
                                <input type="text" class="form-control" value="" name="goal" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Team Type</label>
                                <?php $team_type = App\Models\TeamType::where('status', 1)->pluck('name', 'id'); ?>
                                <select class="form-control mb-3" name="team_type" required>
                                    <option value="">---Select One---</option>
                                    @foreach($team_type as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="created_by">
                            <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="updated_by">
                            <button type="submit" class="btn btn-primary submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
        });
    </script>
@endpush
