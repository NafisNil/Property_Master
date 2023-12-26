@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endpush

@section('page_title')
    Add Activity Log
@endsection

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('ActivityLog.index') }}">Activity Log</a></li>
            <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
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
                    <h6 class="card-title">Activity Log Create Form</h6>
                    <form action="{{ route('ActivityLog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="appointment_date_and_time" class="form-label">Appointment Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="appointment_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
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
                                <select class="form-control mb-3" name="from_name">
                                    <option value="">-----Select----</option>
                                    <option value="1">kkkk</option>
                                    <option value="2">ppppp</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="from_id_no" class="form-label">ID No.</label>
                                    <input type="text" class="form-control" placeholder="" name="from_id_no">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="deliveries_date_and_time" class="form-label">Deliveries Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="deliveries_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="emergencies_date_and_time" class="form-label">Emergencies Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="emergencies_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="phones_emails_and_faxes_date_and_time" class="form-label">Phones,emails
                                        and Faxes Date and Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="phones_emails_and_faxes_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="incidents_date_and_time" class="form-label">Incidents Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="incidents_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="inspections_date_and_time" class="form-label">Inspections Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="inspections_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="lost_and_found_date_and_time" class="form-label">Lost and Found Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="lost_and_found_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="mails_ourier_date_and_time" class="form-label">Mails & Courier Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="mails_ourier_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="meeting_date_and_time" class="form-label">Meeting Date and Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="meeting_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="orders_date_and_time" class="form-label">Orders Date and Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="orders_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="receiving_date_and_time" class="form-label">Receiving Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="receiving_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="repair_and_maintenance_date_and_time" class="form-label">Repair and
                                        Maintenance Date and Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="repair_and_maintenance_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="shipping_date_and_time" class="form-label">Shipping Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="shipping_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-sm-12"><h3>Staff Clock in/out</h3></div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="staff_clock_date_and_time" class="form-label">Staff Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="staff_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="schoolCode" class="form-label">Staff ID. No</label>
                                    <input type="text" class="form-control" value="" name="staff_id_no">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="schoolCode" class="form-label">Staff Name</label>
                                    <input type="text" class="form-control" value="" name="staff_name">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Department</label>
                                    <?php $dept = App\Models\Department::where('school_id', $school_info->id)->where('status', 1)->pluck('name', 'id'); ?>
                                    <select class="form-control mb-3" name="departments">
                                        <option value="">---Select One---</option>
                                        @foreach($dept as $key => $val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="staff_time_in" class="form-label">Time In</label>
                                    <input type="time" class="form-control" value="" name="staff_time_in">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="staff_time_out" class="form-label">Time Out</label>
                                    <input type="time" class="form-control" value="" name="staff_time_out">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>

                            <div class="col-sm-12"><h3>Visitors</h3></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="visitors_no" class="form-label">Visitors No</label>
                                    <input type="text" class="form-control" value="" name="visitors_no">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="visitors_date_and_time" class="form-label">Visitors Date and
                                        Time</label>
                                    <input type="datetime-local" class="form-control" placeholder=""
                                           name="visitors_date_and_time">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="visito_name" class="form-label">Visito's Name</label>
                                    <input type="text" class="form-control" value="" name="visito_name">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="from_company" class="form-label">From Company</label>
                                    <input type="text" class="form-control" value="" name="from_company">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="phone_no" class="form-label">Phone No</label>
                                    <input type="text" class="form-control" value="" name="phone_no">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email" class="form-label">Emails</label>
                                    <input type="email" class="form-control" value="" name="email">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="visit_reason" class="form-label">Visit Reason</label>
                                    <input type="text" class="form-control" value="" name="visit_reason">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="person_or_dept_visiting" class="form-label">Person/Dept.
                                        Visiting</label>
                                    <input type="text" class="form-control" value="" name="person_or_dept_visiting">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="visitors_time_in" class="form-label">Visitors Time In</label>
                                    <input type="time" class="form-control" value="" name="visitors_time_in">
                                    <small class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="visitors_time_out" class="form-label">Visitors Time Out</label>
                                    <input type="time" class="form-control" value="" name="visitors_time_out">
                                    <small class="form-text text-muted"></small>
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
                                <input type="hidden" class="form-control" value="{{$school_info->id }}"
                                       name="school_id">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="created_by">
                                <input type="hidden" class="form-control" value="{{Auth::user()->id }}"
                                       name="updated_by">
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
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

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
        });
    </script>
@endpush
