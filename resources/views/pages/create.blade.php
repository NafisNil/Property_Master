@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
{{$title}}
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
                <h6 class="card-title">{{$title}} create Form</h6>
                <form action="{{ route('pages.pagesStore') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="{{$title}}">{{$title}}</label>
                                <textarea name="content" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;" required ></textarea>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="school_id" value="{{ ($school_info->id) ? $school_info->id : '' }}">
                    <input type="hidden" name="name" value="{{ ($title) ? $title : '' }}">
                    <input type="hidden" name="url" value="{{ ($url) ? $url : '' }}">
                    <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
@endpush
