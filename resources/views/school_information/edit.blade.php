@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
About {{$school_info->name}} Edit
@endsection

@section('content')

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
                <h6 class="card-title">About {{$school_info->name}} Edit Form</h6>
                <form action="{{ route('SchoolAbout.messageUpdate') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">About</label>
                                <textarea name="about" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;" required >{{$school_info->about}}</textarea>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="school_id" value="{{ ($school_info->id) ? $school_info->id : '' }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush
