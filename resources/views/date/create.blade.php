@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
Add Date
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Date.index') }}">Date</a></li>
        <li class="breadcrumb-item active" aria-current="page">Date</li>
    </ol>
</nav>

<div class="row">
    <div class="col-sm-6">
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
                <h6 class="card-title">Date Create Form</h6>
                <form action="{{ route('Date.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">School</label>
                                <input type="text" class="form-control" placeholder="" name="" value="{{$school_info->name}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="event_id_no" class="form-label">Event ID No</label>
                                <input type="text" class="form-control" placeholder="" name="event_id" value="{{time()}}" readonly >
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
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
                                <label for="school_level" class="form-label">Account Holders</label>
                                <select class="form-control selectpicker" id="post_in_accounthold" name="post_in_accounthold[]" multiple>
                                    @foreach ($user_type as $key => $value)
                                    <option value="{{ $key }}" > {{ $value }} </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3></h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="comments" class="form-label">Comments</label>
                                <textarea name="comments" rows="1" class="form-control" ></textarea>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="required_action" class="form-label">Required Action </label>
                                <textarea  name="required_action" rows="1" class="form-control"></textarea>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3>Reminder Schedule </h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="first_reminder_date_time" class="form-label">First Reminder Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="first_reminder_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="second_reminder_date_time" class="form-label">Second Reminder Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="second_reminder_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="third_reminder_date_time" class="form-label">Third Reminder Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="third_reminder_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="fourth_reminder_date_time" class="form-label">Fourth Reminder Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="fourth_reminder_date_time" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Reminder Method</label>
                            <select class="form-control mb-3" name="reminder_method">
                                <option value="">-----Select----</option>
                                <option value="1">Email</option>
                                <option value="2">Text Message</option>
                            </select>
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

                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="created_by">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}" name="updated_by">
                                <button type="submit" class="btn btn-primary submit">Submit</button>
                            </div>
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
    $("#from_account_type").on('change', function () {
        var level = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        alert(level);
        if (level) {
            $.ajax({
                type: 'POST',
//                url: '{{ route("Memorandum.getUser") }}',
                url: 'https://schooloptimizer.golamsoroar.com/memorandum-getuser',
                data: {_token: CSRF_TOKEN, user_type: 4},
                success: function (htmlresponse) {
                    $('#from_user_id').html(htmlresponse);
                    alert('htmlresponse');
                }, error: function (e) {
                    alert("error");
                }
            });
        }
    });

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
