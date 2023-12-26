@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
Add Announcement
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('schoolAnnouncment.index') }}">Announcement Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Announcement</li>
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
                <h6 class="card-title">Announcement Create Form</h6>
                <form action="{{ route('schoolAnnouncment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Event ID</label>
                                <input type="text" class="form-control" placeholder="" name="event_id" value="{{'ev-' . random_int(100000, 999999)}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
<!--                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">School</label>
                                <input type="text" class="form-control" placeholder="" name="" value="{{$school_info->name}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>-->

                        <div class="col-sm-3">
                            <div class="form-group mb-3">
                                <label for="from_date" class="form-label">Post Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="post_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group mb-3">
                                <label for="from_date" class="form-label">From Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="from_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group mb-3">
                                <label for="from_date" class="form-label">To Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="to_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group mb-3">
                                <label for="from_date" class="form-label">Expire Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="expaire_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="school_level" class="form-label">Title</label>
                                <select class="form-control" name="title">
                                    <option>Select Title</option>
                                    @foreach ($announcment as $key => $value)
                                    <option value="{{ $key }}" > {{ $value }} </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3>Post in</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="school_level" class="form-label">Educational Departments</label>
                                <select class="form-control selectpicker" id="post_in_edudip" name="post_in_edudip[]" multiple>
                                    @foreach ($aca_dip as $key => $value)
                                        <option value="{{ $key }}" > {{ $value }} </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="school_level" class="form-label">Administrative Departments</label>
                                <select class="form-control selectpicker" id="adin_dpt_multiselect" name="post_in_admdip[]" multiple>
                                    @foreach ($add_dip as $key => $value)
                                        <option value="{{ $key }}" > {{ $value }} </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="school_level" class="form-label">Account Holders</label>
                                <select class="form-control selectpicker" id="post_in_accounthold" name="post_in_accounthold[]" multiple>
                                    @foreach ($user_type as $key => $value)
                                        <option value="{{ $key }}" > {{ $value }} </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group mb-3">
                                <label for="comments" class="form-label">Comments</label>
                                <textarea name="comments" rows="1" class="form-control" ></textarea>
                                <div class="valid-feedback"></div>
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
<script type="text/javascript">
    jQuery(document).ready(function ($) {
    $('#adin_dpt_multiselect').multiselect({
        includeSelectAllOption: true,
        nonSelectedText: 'Select Administrative Departments',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        allSelectedText: 'All Selected',
        buttonWidth: '100%',
        maxHeight: 350
    });

    $('#post_in_edudip').multiselect({
        includeSelectAllOption: true,
        nonSelectedText: 'Select Educational Departments',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        allSelectedText: 'All Selected',
        buttonWidth: '100%',
        maxHeight: 350
    });

    $('#post_in_accounthold').multiselect({
        includeSelectAllOption: true,
        nonSelectedText: 'Select Account Holders',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        allSelectedText: 'All Selected',
        buttonWidth: '100%',
        maxHeight: 350
    });
});
</script>

@endpush
