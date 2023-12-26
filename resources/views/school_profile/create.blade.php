@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush

@section('page_title')
Add Registration Deadlines
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('registrationDeadlines.index') }}">Registration Deadlines Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Registration Deadlines</li>
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
                <h6 class="card-title">Registration Deadlines Create Form</h6>
                <form action="{{ route('registrationDeadlines.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="event_code" class="form-label">Event Code</label>
                                <input type="text" class="form-control" placeholder="" name="event_code" required>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="event_name" class="form-label">Event Name</label>
                                <input type="text" class="form-control" placeholder="" name="event_name" required>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="due_on" class="form-label">Due on</label>
                                <input type="text" class="form-control" placeholder="" name="due_on" >
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="recuring_cycle" class="form-label">Recuring Cycle</label>
                                <input type="text" class="form-control" placeholder="" name="recuring_cycle">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <input type="text" class="form-control" placeholder="" name="comment">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
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

@endpush
