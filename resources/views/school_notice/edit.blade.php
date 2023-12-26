@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
Update School Notice
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('SchoolNotice.index') }}">School Notice Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">School Notice Campus</li>
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
                <h6 class="card-title">School Notice Update Form</h6>
                <form action="{{ route('SchoolNotice.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">School Name</label>
                                <input type="text" class="form-control" placeholder="" name="" value="{{$school_info->name}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="control-label">Notices Type</label>
                            <?php $notice_ty = App\Models\NoticesType::where('status', 1)->pluck('notice_name', 'id');; ?>

                            <select class="form-control mb-3" name="notice_type">
                                <option value="">-----Select One----</option>
                                @foreach($notice_ty as $key => $val)
                                <option value="{{$key}}"  <?php
                                    if ($key == $SchoolNotice->notice_type) {
                                        echo 'selected';
                                    }
                                    ?>>{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="notice_no" class="form-label">Notice No</label>
                                <input type="text" class="form-control" placeholder="" name="notice_no" value="{{$SchoolNotice->notice_no}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="notice_date_time" class="form-label">Date and Time</label>
                                <input type="datetime-local" class="form-control" placeholder="" name="notice_date_time" value="{{$SchoolNotice->notice_date_time}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Priority levels</label>
                            <select class="form-control mb-3" name="priority_levels">
                                <option value="">-----Select----</option>
                                <option value="Low" <?php echo ( $SchoolNotice->priority_levels == 'Low') ? 'selected' : '' ?>>Low</option>
                                <option value="Medium" <?php echo ( $SchoolNotice->priority_levels == 'Medium') ? 'selected' : '' ?>>Medium</option>
                                <option value="High" <?php echo ( $SchoolNotice->priority_levels == 'High') ? 'selected' : '' ?>>High</option>
                                <option value="Urgent" <?php echo ( $SchoolNotice->priority_levels == 'Urgent') ? 'selected' : '' ?>>Urgent</option>
                            </select>
                        </div>

                        <div class="col-sm-12"><h3>From</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="from_account_type" class="form-label">Account Holder Type</label>
                                <select name="from_account_type" class="form-control" id="from_account_type">
                                    <option value="">----Select----</option>
                                    @if(isset($account_type) && !empty($account_type))
                                    @foreach($account_type as $key => $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Name</label>
                            <select class="form-control mb-3" name="from_user_id" id="from_user_id">
                                <option value="">-----Select----</option>                            
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="from_id_no" class="form-label">ID No.</label>
                                <input type="text" class="form-control" placeholder="" name="from_id_no" id="from_id_no" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3>TO</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="to_account_type" class="form-label">Account Holder Type</label>
                                <select name="to_account_type" class="form-control" id="to_account_type">
                                    <option value="">----Select----</option>
                                    @if(isset($account_type) && !empty($account_type))
                                    @foreach($account_type as $key => $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Name</label>
                            <select class="form-control mb-3" name="to_user_id" id="to_user_id">
                                <option value="">-----Select----</option>                          
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="to_id_no" class="form-label">ID No.</label>
                                <input type="text" class="form-control" placeholder="" name="to_id_no" id="to_id_no" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3>CC</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="cc_account_type" class="form-label">Account Holder Type</label>
                                <select name="cc_account_type" class="form-control" id="cc_account_type">
                                    <option value="">----Select----</option>
                                    @if(isset($account_type) && !empty($account_type))
                                    @foreach($account_type as $key => $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Name</label>
                            <select class="form-control mb-3" name="cc_user_id" id="cc_user_id">
                                <option value="">-----Select----</option>                          
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="cc_id_no" class="form-label">ID No.</label>
                                <input type="text" class="form-control" placeholder="" name="cc_id_no" id="cc_id_no" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Subject</label>
                                <?php $sub_cou = App\Models\CourseOutlines::where('school_id', $school_info->id)->where('status', 1)->pluck('name', 'id'); ?>
                                <select class="form-control mb-3" name="subject" >
                                    <option value="">---Select One---</option>
                                    @foreach($sub_cou as $key => $val)
                                    <option value="{{$key}}" <?php
                                    if ($key == $SchoolNotice->subject) {
                                        echo 'selected';
                                    }
                                    ?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="re_case_no" class="form-label">RE Case No.</label>
                                <input type="text" class="form-control" placeholder="" name="re_case_no" value="{{$SchoolNotice->re_case_no}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="2">{{$SchoolNotice->message}}</textarea>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3>Add to Calendars</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="calendar_date" class="form-label">Date</label>
                                <input type="datetime-local" class="form-control" placeholder="" name="calendar_date" value="{{$SchoolNotice->calendar_date}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="control-label">Calendar</label>
                            <select class="form-control mb-3" name="calendar">
                                <option value="">-----Select----</option>
                                <option value="Board Of Director">Board Of Director</option>
                                <option value="Employee">Employee</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Guardian">Guardian</option>
                                <option value="Parent">Parent</option>
                                <option value="Sellers">Sellers</option>
                                <option value="Service Provider">Service Provider</option>
                                <option value="Students">Students</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Visitor">Visitor</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="required_action" class="form-label">Required action</label>
                                <input type="text" class="form-control" placeholder="" name="required_action" value="{{$SchoolNotice->required_action}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="comments" class="form-label">Comments</label>
                                <textarea class="form-control" id="comment" name="comments" rows="2">{{$SchoolNotice->comments}}</textarea>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="prepare_by" class="form-label">Prepare by</label>
                                <input type="text" class="form-control" placeholder="" name="prepare_by" value="{{$SchoolNotice->prepare_by}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="approved_by" class="form-label">Approved By</label>
                                <input type="text" class="form-control" placeholder="" name="approve_by" value="{{$SchoolNotice->approve_by}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="publish_date" class="form-label">Posted Date</label>
                                <input type="datetime-local" class="form-control" placeholder="" name="publish_date" value="{{$SchoolNotice->publish_date}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1" <?php echo ( $SchoolNotice->status == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo ( $SchoolNotice->status == 0) ? 'selected' : '' ?>>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <input type="hidden" class="form-control" value="{{$SchoolNotice->id }}" name="id">
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<script src="{{ asset('assets/js/countrystatecity.js')}}"></script>
<script type="text/javascript">

jQuery(document).ready(function ($) {
//        ============== From ===============
    $("#from_account_type").on('change', function () {
        var level = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        if (level) {
            $.ajax({
                type: 'POST',
//                url: '{{ route("Memorandum.getUser") }}',
                url: 'https://schooloptimizer.golamsoroar.com/school-notice-getuser',
                data: {_token: CSRF_TOKEN, user_type: level},
                success: function (htmlresponse) {
                    $('#from_user_id').html(htmlresponse);
                }, error: function (e) {
                    alert("error");
                }
            });
        }
    });

    $("#from_user_id").on('change', function () {
        var user_id = this.value;
        $("#from_id_no").val(user_id);
    });



    //        ============== To ===============
    $("#to_account_type").on('change', function () {
        var level = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        if (level) {
            $.ajax({
                type: 'POST',
//                url: '{{ route("Memorandum.getUser") }}',
                url: 'https://schooloptimizer.golamsoroar.com/school-notice-getuser',
                data: {_token: CSRF_TOKEN, user_type: level},
                success: function (htmlresponse) {
                    $('#to_user_id').html(htmlresponse);
                }, error: function (e) {
                    alert("error");
                }
            });
        }
    });

    $("#to_user_id").on('change', function () {
        var user_id = this.value;
        $("#to_id_no").val(user_id);
    });



    //        ============== CC ===============
    $("#cc_account_type").on('change', function () {
        var level = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        if (level) {
            $.ajax({
                type: 'POST',
//                url: '{{ route("Memorandum.getUser") }}',
                url: 'https://schooloptimizer.golamsoroar.com/school-notice-getuser',
                data: {_token: CSRF_TOKEN, user_type: level},
                success: function (htmlresponse) {
                    $('#cc_user_id').html(htmlresponse);
                }, error: function (e) {
                    alert("error");
                }
            });
        }
    });

    $("#cc_user_id").on('change', function () {
        var user_id = this.value;
        $("#cc_id_no").val(user_id);
    });

});

$("#office-phone").intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
</script>

@endpush
