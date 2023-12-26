@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
Update Date
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Date.index') }}">Date Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Date</li>
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
                <h6 class="card-title">Date Update Form</h6>
                <form action="{{ route('Date.update') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="name" class="form-label">Event ID No</label>
                                <input type="text" class="form-control" placeholder="" name="event_id" value="{{$date->event_id}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="from_date" class="form-label">From Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="from_date_time"  value="{{$date->from_date_time}}"/>
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
                                    <input type='datetime-local' class="form-control" name="to_date_time" value="{{$date->to_date_time}}" />
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

                                    <option value="{{ $key }}" <?php echo ( $key == $date->title) ? 'selected' : '' ?>> {{ $value }} </option>

                                    @endforeach

                                </select>

                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3>Post in</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="school_level" class="form-label">Educational Departments</label>
                                <!--                                <select class="form-control" name="post_in_edudip">
                                                                    <option>Select Educational Departments</option>-->
                                <select class="form-control selectpicker" id="post_in_edudip" name="post_in_edudip[]" multiple>
                                    @foreach ($aca_dip as $key => $value)
                                        <option value="{{ $key }}" <?php echo ( $key == $date->post_in_edudip) ? 'selected' : ''?>> {{ $value }} </option>
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
                                        <option value="{{ $key }}" <?php echo ( $key == $date->post_in_admdip) ? 'selected' : ''?>> {{ $value }} </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="school_level" class="form-label">Account Holders</label>
                                <!--<select class="form-control" name="post_in_accounthold">-->
                                <select class="form-control selectpicker" id="post_in_accounthold" name="post_in_accounthold[]" multiple>
                                    @foreach ($user_type as $key => $value)
                                        <option value="{{ $key }}" <?php echo ( $key == $date->post_in_accounthold) ? 'selected' : ''?>> {{ $value }} </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="comments" class="form-label">Comments</label>
                                <textarea name="comments" rows="1" class="form-control" >{{$date->comments}}</textarea>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="required_action" class="form-label">Required Action</label>
                                <textarea name="required_action" rows="1" class="form-control" >{{$date->required_action}}</textarea>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3>Reminder Schedule </h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="first_reminder_date_time" class="form-label">First Reminder Date & Time</label>
                                <div class='input-group'>
                                    <input type='datetime-local' class="form-control" name="first_reminder_date_time" value="{{$date->first_reminder_date_time}}" />
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
                                    <input type='datetime-local' class="form-control" name="second_reminder_date_time" value="{{$date->second_reminder_date_time}}" />
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
                                    <input type='datetime-local' class="form-control" name="third_reminder_date_time" value="{{$date->third_reminder_date_time}}" />
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
                                    <input type='datetime-local' class="form-control" name="fourth_reminder_date_time" value="{{$date->fourth_reminder_date_time}}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Reminder Method</label>
                                <select class="form-control mb-3" name="reminder_method" required>
                                    <option value="">---Select One---</option>
                                    <option value="1" <?php echo ( $date->reminder_method == 1) ? 'selected' : '' ?>>Email</option>
                                    <option value="2" <?php echo ( $date->reminder_method == 2) ? 'selected' : '' ?>>Text Message</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1" <?php echo ( $date->status == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo ( $date->status == 0) ? 'selected' : '' ?>>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <input type="hidden" class="form-control" value="{{$date->id }}" name="id">
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
