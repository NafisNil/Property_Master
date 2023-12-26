@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush

@section('page_title')
Update School Closed Days
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('schoolClosedDays.index') }}">School Closed Days Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update School Closed Days</li>
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
                <h6 class="card-title">School Closed Days Update Form</h6>
                <form action="{{ route('schoolClosedDays.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="event_code" class="form-label">Date</label>
                                <input type="text" class="form-control sodate" data-provide="datepicker" value="{{ ($schoolClosedDays->date) ? $schoolClosedDays->date : '' }}" name="date" readonly>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="event_name" class="form-label">Event Name</label>
                                <input type="text" class="form-control" placeholder="" value="{{ ($schoolClosedDays->event_name) ? $schoolClosedDays->event_name : '' }}" name="event_name" required>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <input type="text" class="form-control" placeholder="" value="{{ ($schoolClosedDays->comment) ? $schoolClosedDays->comment : '' }}" name="comment">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1" <?php if(isset($schoolClosedDays->status) && $schoolClosedDays->status == 1){echo 'selected';}?>>Active</option>
                                    <option value="0" <?php if(isset($schoolClosedDays->status) && $schoolClosedDays->status == 0){echo 'selected';}?>>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="updated_by">
                            <input type="hidden" name="id" value="{{ ($schoolClosedDays->id) ? $schoolClosedDays->id : '' }}">
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

@endpush
