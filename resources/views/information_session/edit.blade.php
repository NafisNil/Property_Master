@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush

@section('page_title')
Edit Information Session
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('informationSession.index') }}">Information Session Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Information Session</li>
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
                <h6 class="card-title">Information Session Edit Form</h6>
                <form action="{{ route('informationSession.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Date <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" data-provide="datepicker" name="date" value="{{$informationSession->date}}" readonly required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="nick_name" class="form-label">Information</label>
                                <input type="text" class="form-control" placeholder="" value="{{$informationSession->date}}" name="information">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="department" class="form-label">Department</label>
                                <select name="departments" class="countries form-control" id="departments">
                                    <option value="">Select Department</option>
                                    @if(isset($departments) && !empty($departments))
                                    @foreach($departments as $key => $row)
                                    <option value="{{$row->id}}" <?php if(isset($informationSession->departments) && $informationSession->departments == $row->id){echo 'selected';}?>>{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="department" class="form-label">Who Should Attend?</label>
                            <select name="who_should_attend" class="countries form-control" id="who_should_attend">
                                <option value="">Select User Group</option>
                                @if(isset($user_role) && !empty($user_role))
                                @foreach($user_role as $key => $row)
                                <option value="{{$row->id}}" <?php if(isset($informationSession->who_should_attend) && $informationSession->who_should_attend == $row->id){echo 'selected';}?>>{{$row->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" placeholder="" name="location" value="{{$informationSession->location}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="text" class="form-control" placeholder="" name="time" value="{{$informationSession->time}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="booking" class="form-label">Booking</label>
                                <input type="text" class="form-control" placeholder="" name="booking" value="{{$informationSession->booking}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="add_to_calender" class="form-label">Add to Calender</label>
                                <input type="text" class="form-control" placeholder="" name="add_to_calender" value="{{$informationSession->add_to_calender}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" placeholder="" name="contact" value="{{$informationSession->contact}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="comments" class="form-label">Comments</label>
                                <textarea class="form-control" name="comments" rows="1" cols="50" style="width: 100%; padding: 10px; height: auto;" id="comments">{{$informationSession->comments}}</textarea>
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
                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="updated_by">
                    <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                    <input type="hidden" class="form-control" value="{{$informationSession->id }}" name="id">
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush
