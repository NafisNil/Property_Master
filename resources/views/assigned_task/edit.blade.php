@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
Update Assigned Task
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('AssignedTask.index') }}">Assigned Task Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Assigned Task</li>
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
                <h6 class="card-title">Assigned Task Update Form</h6>
                <form action="{{ route('AssignedTask.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> 

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="task_no" class="form-label">Task No</label>
                                <input type="text" class="form-control" placeholder="" name="task_no" value="{{$AssignedTask->task_no}}" readonly>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="task_date" class="form-label">Task Date</label>
                                <input type="datetime-local" class="form-control" placeholder="" name="task_date" value="{{$AssignedTask->task_date}}">
                                <div class="valid-feedback"></div>
                            </div>
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
                                    if ($key == $AssignedTask->subject) {
                                        echo 'selected';
                                    }
                                    ?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="control-label">Priority levels</label>
                            <select class="form-control mb-3" name="priority_levels">
                                <option value="">-----Select----</option>
                                <option value="Critical" <?php echo ( $AssignedTask->priority_levels == 'Critical') ? 'selected' : '' ?>>Critical</option>
                                <option value="High" <?php echo ( $AssignedTask->priority_levels == 'High') ? 'selected' : '' ?>>High</option>
                                <option value="Medium" <?php echo ( $AssignedTask->priority_levels == 'Medium') ? 'selected' : '' ?>>Medium</option>
                                <option value="Low" <?php echo ( $AssignedTask->priority_levels == 'Low') ? 'selected' : '' ?>>Low</option>
                                <option value="Normal" <?php echo ( $AssignedTask->priority_levels == 'Normal') ? 'selected' : '' ?>>Normal</option>
                            </select>
                        </div>   
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="2">{{$AssignedTask->message}}</textarea>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="re_case_no" class="form-label">Instruction</label>
                                <input type="text" class="form-control" placeholder="" name="instruction" value="{{$AssignedTask->instruction}}">
                                <div class="valid-feedback"></div>
                            </div>
                        </div>                     
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1" <?php echo ( $AssignedTask->status == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo ( $AssignedTask->status == 0) ? 'selected' : '' ?>>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <input type="hidden" class="form-control" value="{{$AssignedTask->id }}" name="id">
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
                url: 'https://schooloptimizer.golamsoroar.com/assigned-task-getuser',
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
                url: 'https://schooloptimizer.golamsoroar.com/assigned-task-getuser',
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
                url: 'https://schooloptimizer.golamsoroar.com/assigned-task-getuser',
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
