@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush

@section('page_title')
Add Marks Structure
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('marksStructure.index') }}">Marks Structure Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Marks Structure</li>
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
                <h6 class="card-title">Marks Structure Create Form</h6>
                <form action="{{ route('marksStructure.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="assesment_type" class="form-label">Assesment Type</label>
                                <select name="assesment_type" class="form-control" id="assesment_type">
                                    <option value="">Select Assesment Type</option>
                                    @if(isset($assesment_type) && !empty($assesment_type))
                                    @foreach($assesment_type as $key => $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="course" class="form-label">Course</label>
                                <select name="course" class="form-control" id="course">
                                    <option value="">Select Course</option>
                                    @if(isset($course) && !empty($course))
                                    @foreach($course as $key => $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">School</label>
                                <input type="text" class="form-control" placeholder="" name="" value="{{$school_info->name}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="text" class="form-control" placeholder="" name="grade" >
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="percent" class="form-label">Percent</label>
                                <input type="text" class="form-control" placeholder="" name="percent" >
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="passing_marks" class="form-label">Passing Marks</label>
                                <input type="text" class="form-control" placeholder="" name="passing_marks" >
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
