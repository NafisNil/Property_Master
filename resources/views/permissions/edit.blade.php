@extends('layouts.master')

@push('css')

@endpush

@section('page_title')
    Permission Edit
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Permission Edit</li>
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
                    <h6 class="card-title">Sample Form</h6>
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $permission->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <select class="form-control mb-3" name="active" required>
                                        <option value="Y"{{ isset($permission->active) && $permission->active=='Y' ? "selected" : ""}}>Active</option>
                                        <option value="N"{{ isset($permission->active) && $permission->active=='Y' ? "selected" : ""}}>In-Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker_edit_custom.js') }}"></script>
    <script></script>
@endpush
