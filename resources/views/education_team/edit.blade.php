@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
Update Student Registration
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('StudentRegistration.index') }}">Student Registration Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Student Registration</li>
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
                <h6 class="card-title">Student Registration Update Form</h6>
                <form action="{{ route('StudentRegistration.update') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="datetime-local" class="form-control" value="{{ $EducationTeam->creation_date}}" name="creation_date" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Net Operating Days</label>
                                <input type="text" class="form-control" value="{{ $EducationTeam->net_operating_days}}" name="net_operating_days" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Current Status</label>
                                <select class="form-control mb-3" name="current_status" required>
                                    <option value="">---Select One---</option>
                                    <option value="In-Processes" <?php echo ( $EducationTeam->current_status == 'In-Processes') ? 'selected' : '' ?>>In-Processes</option>
                                    <option value="Canceled" <?php echo ( $EducationTeam->current_status == 'Canceled') ? 'selected' : '' ?>>Canceled</option>
                                    <option value="Closed" <?php echo ( $EducationTeam->current_status == 'Closed') ? 'selected' : '' ?>>Closed</option>
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
                                    <option value="{{$key}}" <?php echo ( $key == $EducationTeam->team_group) ? 'selected' : ''?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Goal(s)</label>
                                <input type="text" class="form-control" value="{{ $EducationTeam->creation_date}}" name="goal" >
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
                                    <option value="{{$key}}" <?php echo ( $key == $EducationTeam->team_type) ? 'selected' : ''?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1" <?php echo ( $EducationTeam->status == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo ( $EducationTeam->status == 0) ? 'selected' : '' ?>>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <input type="hidden" class="form-control" value="{{$EducationTeam->id }}" name="id">
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
