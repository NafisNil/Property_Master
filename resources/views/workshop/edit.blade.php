@extends('layouts.master')

@push('css')
@endpush

@section('page_title')
Update Workshop
@endsection

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Workshop.index') }}">Workshop Directory</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Workshop</li>
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
                <h6 class="card-title">Workshop Update Form</h6>
                <form action="{{ route('Workshop.update') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="workshop_no" class="form-label">Workshop No<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{$Workshop->workshop_no}}" name="workshop_no" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Workshop Type</label>
                                <?php $classroom_no = App\Models\ClassroomType::where('status', 1)->pluck('name', 'id'); ?>
                                <select class="form-control mb-3" name="workshop_type" required>
                                    <option value="{{$Workshop->workshop_no}}">---Select One---</option>
                                    @foreach($classroom_no as $key => $val)
                                    <option value="{{$key}}" <?php if ($key == $Workshop->workshop_type) { echo 'selected';} ?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3 class="">Occupant Type</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="teacher_instructor_qty" class="form-label">Teacher/ Instructor (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->teacher_instructor_qty}}" name="teacher_instructor_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="teacher_instructor_ssistant_qty" class="form-label">Teacher/ Instructor Assistant (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->teacher_instructor_ssistant_qty}}" name="teacher_instructor_ssistant_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="typical_student_qty" class="form-label">Typical Student (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->typical_student_qty}}" name="typical_student_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="handicapped_students_qty" class="form-label">Handicapped Students (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->handicapped_students_qty}}" name="handicapped_students_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="special_needs_students_qty" class="form-label">Special Needs Students (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->special_needs_students_qty}}" name="special_needs_students_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="visitors_qty" class="form-label">Visitors (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->visitors_qty}}" name="visitors_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="guest_qty" class="form-label">Guest (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->guest_qty}}" name="guest_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="total_qty" class="form-label">Total (Qty)</label>
                                <input type="text" class="form-control" value="{{$Workshop->total_qty}}" name="total_qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Workshop Campus</label>
                                <?php $workshop_cam = \App\Models\Campus::where('school_id', $school_info->id)->where('status', 1)->pluck('name', 'id'); ?>
                                <select class="form-control mb-3" name="workshop_campus" required>
                                    <option value="{{$Workshop->workshop_no}}">---Select One---</option>
                                    @foreach($workshop_cam as $key => $val)
                                    <option value="{{$key}}" <?php if ($key == $Workshop->workshop_campus) { echo 'selected'; } ?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3 class="">Workshop Seats</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="seat_no" class="form-label">Seat No</label>
                                <input type="text" class="form-control" value="{{$WorkshopSeat->seat_no}}" name="seat_no" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Occupant</label>
                                <?php $occupant = App\Models\ClassroomSeatOccupant::where('status', 1)->pluck('name', 'id'); ?>
                                <select class="form-control mb-3" name="occupant" required>
                                    <option value="">---Select One---</option>
                                    @foreach($occupant as $key => $val)
                                    <option value="{{$key}}" <?php if ($key == $WorkshopSeat->occupant) { echo 'selected';} ?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="id_no" class="form-label">ID No</label>
                                <input type="text" class="form-control" value="{{$WorkshopSeat->id_no}}" name="id_no" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" value="{{$WorkshopSeat->first_name}}" name="first_name" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" value="{{$WorkshopSeat->middle_name}}" name="middle_name" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="{{$WorkshopSeat->last_name}}" name="last_name" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="photo" class="form-label">Photo</label><br />
                                <input type="file" class="form-control" id="myFile" name="photo">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="ph_no" class="form-label">Ph. No</label><br />
                                <input type="tel" class="form-control" id="ph-no" style="border-radius: 5px 0 0 5px; padding: 8px 20px 8px 50px" name="ph_no" value="{{$WorkshopSeat->ph_no}}"">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{$WorkshopSeat->email}}" name="email" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="student_type" class="form-label">Student Type</label>
                                <select class="form-control mb-3" name="student_type">
                                    <option value="" >----Select One----</option>
                                    <option value="Typical" <?php echo ( $WorkshopSeat->student_type == 'Typical') ? 'selected' : '' ?>>Typical</option>
                                    <option value="Special Needs" <?php echo ( $WorkshopSeat->student_type == 'Special Needs') ? 'selected' : '' ?>>Special Needs</option>
                                    <option value="Handicapped" <?php echo ( $WorkshopSeat->student_type == 'Handicapped') ? 'selected' : '' ?>>Handicapped</option>
                                </select>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="seat_status" class="form-label">Seat Status</label>
                                <select class="form-control mb-3" name="seat_status">
                                    <option value="" >----Select One----</option>
                                    <option value="1" <?php echo ( $WorkshopSeat->seat_status == 1) ? 'selected' : '' ?>>Vacant</option>
                                    <option value="2" <?php echo ( $WorkshopSeat->seat_status == 0) ? 'selected' : '' ?>>Occupied</option>
                                </select>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>


                        <div class="col-sm-12"><h3 class="">Fixed assets In Workshop</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Asset Name</label>
                                <?php $asset_na = App\Models\AssetName::pluck('name'); ?>
                                <select class="form-control mb-3" name="asset_name" required>
                                    <option value="">---Select One---</option>
                                    @foreach($asset_na as $key => $val)
                                    <option value="{{$key}}" <?php if ($key == $FixedAsset->asset_name) { echo 'selected';} ?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Quantity</label>
                                <input type="text" class="form-control" value="{{$FixedAsset->quantity}}" name="quantity" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{$FixedAsset->name}}" name="name" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Model</label>
                                <input type="text" class="form-control" value="{{$FixedAsset->model}}" name="model" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Color</label>
                                <input type="text" class="form-control" value="{{$FixedAsset->color}}" name="color" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Size</label>
                                <input type="text" class="form-control" value="{{$FixedAsset->size}}" name="size" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="schoolCode" class="form-label">Serial Number</label>
                                <input type="text" class="form-control" value="{{$FixedAsset->serial_number}}" name="serial_number" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="asset_condition" class="form-label">Asset Condition</label>
                                <input type="text" class="form-control" value="{{$FixedAsset->asset_condition}}" name="asset_condition" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="2">{{$FixedAsset->comment}}</textarea>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>


                        <div class="col-sm-12"><h3 class="">Safety and Security Devices</h3></div>
                        <div class="col-sm-4">
                            <label class="control-label">Safety Item</label>
                            <?php $safety_item = App\Models\SafetySecurityItem::where('status', 1)->pluck('name', 'id'); ?>
                            <select class="form-control mb-3" name="safety_item">
                                <option value="">-----Select One----</option>
                                @foreach($safety_item as $key => $val)
                                <option value="{{$key}}" <?php if ($key == $SafetyAndSecurity->safety_item) { echo 'selected';} ?>>{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Location</label>
                                <?php $cam = \App\Models\Campus::where('school_id', $school_info->id)->where('status', 1)->pluck('name', 'id'); ?>
                                <select class="form-control mb-3" name="campus" required>
                                    <option value="">---Select One---</option>
                                    @foreach($cam as $key => $val)
                                    <option value="{{$key}}" <?php if ($key == $SafetyAndSecurity->campus) { echo 'selected';} ?>>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" value="{{$SafetyAndSecurity->qty}}" name="qty" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="serial_no" class="form-label">Serial No</label>
                                <input type="text" class="form-control" value="{{$SafetyAndSecurity->serial_no}}" name="serial_no" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="expiry_date" class="form-label">Expiry Date</label>
                                <input type="datetime-local" class="form-control" value="{{$SafetyAndSecurity->expiry_date}}" name="expiry_date" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="renew_date" class="form-label">Renew Date</label>
                                <input type="datetime-local" class="form-control" value="{{$SafetyAndSecurity->renew_date}}" name="renew_date" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cycle" class="form-label">Inspection Cycle</label>
                                <input type="text" class="form-control" value="{{$SafetyAndSecurity->inspection_cycle}}" name="inspection_cycle">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="due_on" class="form-label"> Inspection Due on </label>
                                <input type="text" class="form-control" value="{{$SafetyAndSecurity->inspection_due_on}}" name="inspection_due_on">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>


                        <div class="col-sm-12"><h3 class="">Safety and Insurance Protection</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Insurance Type</label>
                                <select class="form-control mb-3" name="insurance_type" required>
                                    <option value="">---Select One---</option>
                                    <option value="Life Insurance" <?php echo ( $SafetyAndInsuranceProtection->insurance_type == 'Life Insurance') ? 'selected' : '' ?>>Life Insurance</option>
                                    <option value="Health" <?php echo ( $SafetyAndInsuranceProtection->insurance_type == 'Health') ? 'selected' : '' ?>>Health</option>
                                    <option value="Long term Disability" <?php echo ( $SafetyAndInsuranceProtection->insurance_type == 'Long term Disability') ? 'selected' : '' ?>>Long term Disability</option>
                                    <option value="Work Place" <?php echo ( $SafetyAndInsuranceProtection->insurance_type == 'Work Place') ? 'selected' : '' ?>>Work Place</option>
                                    <option value="Injury" <?php echo ( $SafetyAndInsuranceProtection->insurance_type == 'Injury') ? 'selected' : '' ?>>Injury</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="staff" class="form-label">Staff</label>
                                <input type="text" class="form-control" value="{{$SafetyAndInsuranceProtection->staff}}" name="staff" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="students" class="form-label">Students</label>
                                <input type="text" class="form-control" value="{{$SafetyAndInsuranceProtection->students}}" name="students" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="fixed_assets" class="form-label">Fixed Assets</label>
                                <input type="text" class="form-control" value="{{$SafetyAndInsuranceProtection->fixed_assets}}" name="fixed_assets" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="property" class="form-label">Property</label>
                                <input type="text" class="form-control" value="{{$SafetyAndInsuranceProtection->property}}" name="property" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insurer" class="form-label">Insurer</label>
                                <input type="text" class="form-control" value="{{$SafetyAndInsuranceProtection->insurer}}" name="insurer" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="expiry_date" class="form-label">Expiry Date</label>
                                <input type="datetime-local" class="form-control" value="{{$SafetyAndInsuranceProtection->expiry_date}}" name="expiry_date" >
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>


                        <div class="col-sm-12"><h3>For Accounting</h3></div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="account_no" class="form-label">Account No</label>
                                <input type="text" class="form-control" name="account_no" value="{{ $ForAccounting->account_no }}">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="cost_center" class="form-label">Cost Centre</label>
                                <input type="text" class="form-control" name="cost_center" value="{{ $ForAccounting->cost_center }}">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-3">
                                <label for="income_center" class="form-label">Income Centre</label>
                                <input type="text" class="form-control" name="income_center" value="{{ $ForAccounting->income_center }}">
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="col-sm-12"><h3 class="">Workshop  Rules and Policies</h3></div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rules_and_policies" class="form-label">Rules and Policies</label>
                                <textarea class="form-control" id="rules_and_policies" name="rules_and_policies" rows="2">{{ $RulesAndPolicies->rules_and_policies }}</textarea>
                                <small class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control mb-3" name="status" required>
                                    <option value="1" <?php echo ( $Workshop->status == 1) ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo ( $Workshop->status == 0) ? 'selected' : '' ?>>In-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="updated_by">
                            <input type="hidden" class="form-control" value="{{$school_info->id }}" name="school_id">
                            <input type="hidden" class="form-control" value="{{$Workshop->id }}" name="Workshop_id">
                            <input type="hidden" class="form-control" value="{{$WorkshopSeat->id }}" name="WorkshopSeat_id">
                            <input type="hidden" class="form-control" value="{{$FixedAsset->id }}" name="FixedAsset_id">
                            <input type="hidden" class="form-control" value="{{$SafetyAndSecurity->id }}" name="SafetyAndSecurity_id">
                            <input type="hidden" class="form-control" value="{{$SafetyAndInsuranceProtection->id }}" name="SafetyAndInsuranceProtection_id">
                            <input type="hidden" class="form-control" value="{{$ForAccounting->id }}" name="ForAccounting_id">
                            <input type="hidden" class="form-control" value="{{$RulesAndPolicies->id }}" name="RulesAndPolicies_id">
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
        });
    </script>
@endpush
