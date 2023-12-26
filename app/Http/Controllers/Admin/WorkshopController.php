<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\Workshop;
use App\Models\WorkshopFixedAssets;
use App\Models\WorkshopRulesAndPolicies;
use App\Models\WorkshopForAccounting;
use App\Models\WorkshopSafetyAndInsuranceProtection;
use App\Models\WorkshopSafetyAndSecurityDevices;
use App\Models\WorkshopSeats;

class WorkshopController extends Controller {

    use \App\Traits\FileSaver;

    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $Workshop = Workshop::where('school_id', $school_id)->get();
        $school_info = School::where('id', $school_id)->first();
        return view('workshop.index', compact('school_info', 'Workshop'));
    }

    public function create() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();
        return view('workshop.create', compact('school_info'));
    }

    public function store(Request $request) {
        $request->validate([
            'workshop_no' => 'required',
        ]);
        $workshopSeat = WorkshopSeats::create([
                    'seat_no' => $request->seat_no,
                    'occupant' => $request->occupant,
                    'id_no' => $request->id_no,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'ph_no' => $request->ph_no,
                    'email' => $request->email,
                    'student_type' => $request->student_type,
                    'seat_status' => $request->seat_status,
                    'comments' => $request->comments,
                    'status' => $request->status,
        ]);
        $this->upload_file($request->photo, $workshopSeat, 'photo', 'WorkshopSeat');

        $workshopFixedAsset = WorkshopFixedAssets::create([
                    'asset_name' => $request->asset_name,
                    'quantity' => $request->quantity,
                    'name' => $request->name,
                    'model' => $request->model,
                    'color' => $request->color,
                    'size' => $request->size,
                    'serial_number' => $request->serial_number,
                    'asset_condition' => $request->asset_condition,
                    'comment' => $request->comment,
                    'status' => $request->status,
        ]);
        $workshopSafetyAndSecurity = WorkshopSafetyAndSecurityDevices::create([
                    'safety_item' => $request->safety_item,
                    'campus' => $request->campus,
                    'qty' => $request->qty,
                    'serial_no' => $request->serial_no,
                    'expiry_date' => $request->expiry_date,
                    'renew_date' => $request->renew_date,
                    'inspection_cycle' => $request->inspection_cycle,
                    'inspection_due_on' => $request->inspection_due_on,
                    'status' => $request->status,
        ]);
        $workshopSafetyAndInsuranceProtection = WorkshopSafetyAndInsuranceProtection::create([
                    'insurance_type' => $request->insurance_type,
                    'staff' => $request->staff,
                    'students' => $request->students,
                    'fixed_assets' => $request->fixed_assets,
                    'property' => $request->property,
                    'insurer' => $request->insurer,
                    'expiry_date' => $request->expiry_date,
                    'status' => $request->status,
        ]);
        $workshopForAccounting = WorkshopForAccounting::create([
                    'account_no' => $request->account_no,
                    'cost_center' => $request->cost_center,
                    'income_center' => $request->income_center,
                    'status' => $request->status,
        ]);
        $workshopRulesAndPolicies = WorkshopRulesAndPolicies::create([
                    'rules_and_policies' => $request->rules_and_policies,
                    'status' => $request->status,
        ]);
        Workshop::create([
            'school_id' => 1,
            'workshop_no' => $request->workshop_no,
            'workshop_category' => $request->workshop_category,
            'workshop_type' => $request->workshop_type,
            'teacher_instructor_qty' => $request->teacher_instructor_qty,
            'teacher_instructor_ssistant_qty' => $request->teacher_instructor_ssistant_qty,
            'typical_student_qty' => $request->typical_student_qty,
            'handicapped_students_qty' => $request->handicapped_students_qty,
            'special_needs_students_qty' => $request->special_needs_students_qty,
            'total_qty' => $request->total_qty,
            'visitors_qty' => $request->visitors_qty,
            'guest_qty' => $request->guest_qty,
            'workshop_campus' => $request->workshop_campus,
            'workshop_seats' => $workshopSeat->id,
            'workshop_fixed_asset' => $workshopFixedAsset->id,
            'workshop_safety_and_security' => $workshopSafetyAndSecurity->id,
            'workshop_safety_and_insurance_protection' => $workshopSafetyAndInsuranceProtection->id,
            'workshop_for_accounting' => $workshopForAccounting->id,
            'workshop_rules_and_policies' => $workshopRulesAndPolicies->id,
            'status' => $request->status,
        ]);
        return redirect()->route('Workshop.index')
                        ->with('success', 'Information added successfully.');
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function edit($id) {
        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school;
            $school_info = School::where('id', $school_id)->first();
            $Workshop = Workshop::where('id', $id)->first();
            $WorkshopSeat = WorkshopSeats::where('id', $Workshop->workshop_seats)->first();
            $FixedAsset = WorkshopfixedAssets::where('id', $Workshop->workshop_fixed_asset)->first();
            $SafetyAndSecurity = WorkshopSafetyAndSecurityDevices::where('id', $Workshop->workshop_safety_and_security)->first();
            $SafetyAndInsuranceProtection = WorkshopSafetyAndInsuranceProtection::where('id', $Workshop->workshop_safety_and_insurance_protection)->first();
            $ForAccounting = WorkshopForAccounting::where('id', $Workshop->workshop_for_accounting)->first();
            $RulesAndPolicies = WorkshopRulesAndPolicies::where('id', $Workshop->workshop_rules_and_policies)->first();
            return view('workshop.edit', compact('school_info', 'Workshop', 'WorkshopSeat', 'FixedAsset', 'SafetyAndSecurity', 'SafetyAndInsuranceProtection', 'ForAccounting', 'RulesAndPolicies'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'workshop_no' => 'required',
        ]);
        $workshopSeat = WorkshopSeats::updateOrCreate([
                    'id' => $request->WorkshopSeat_id,
                        ],
                        [
                            'seat_no' => $request->seat_no,
                            'occupant' => $request->occupant,
                            'id_no' => $request->id_no,
                            'first_name' => $request->first_name,
                            'middle_name' => $request->middle_name,
                            'last_name' => $request->last_name,
                            'ph_no' => $request->ph_no,
                            'email' => $request->email,
                            'student_type' => $request->student_type,
                            'seat_status' => $request->seat_status,
                            'comments' => $request->comments,
                            'status' => $request->status,
        ]);
        $this->upload_file($request->photo, $workshopSeat, 'photo', 'WorkshopSeat');

        WorkshopFixedAssets::find($request->FixedAsset_id)->update([
            'asset_name' => $request->asset_name,
            'quantity' => $request->quantity,
            'name' => $request->name,
            'model' => $request->model,
            'color' => $request->color,
            'size' => $request->size,
            'serial_number' => $request->serial_number,
            'asset_condition' => $request->asset_condition,
            'comment' => $request->comment,
            'status' => $request->status,
        ]);
        WorkshopSafetyAndSecurityDevices::find($request->SafetyAndSecurity_id)->update([
            'safety_item' => $request->safety_item,
            'campus' => $request->campus,
            'qty' => $request->qty,
            'serial_no' => $request->serial_no,
            'expiry_date' => $request->expiry_date,
            'renew_date' => $request->renew_date,
            'inspection_cycle' => $request->inspection_cycle,
            'inspection_due_on' => $request->inspection_due_on,
            'status' => $request->status,
        ]);
        WorkshopSafetyAndInsuranceProtection::find($request->SafetyAndInsuranceProtection_id)->update([
            'insurance_type' => $request->insurance_type,
            'staff' => $request->staff,
            'students' => $request->students,
            'fixed_assets' => $request->fixed_assets,
            'property' => $request->property,
            'insurer' => $request->insurer,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
        ]);
        WorkshopForAccounting::find($request->ForAccounting_id)->update([
            'account_no' => $request->account_no,
            'cost_center' => $request->cost_center,
            'income_center' => $request->income_center,
            'status' => $request->status,
        ]);
        WorkshopRulesAndPolicies::find($request->RulesAndPolicies_id)->update([
            'rules_and_policies' => $request->rules_and_policies,
            'status' => $request->status,
        ]);
        Workshop::find($request->Workshop_id)->update([
            'school_id' => 1,
            'workshop_no' => $request->workshop_no,
            'workshop_category' => $request->workshop_category,
            'workshop_type' => $request->workshop_type,
            'teacher_instructor_qty' => $request->teacher_instructor_qty,
            'teacher_instructor_ssistant_qty' => $request->teacher_instructor_ssistant_qty,
            'typical_student_qty' => $request->typical_student_qty,
            'handicapped_students_qty' => $request->handicapped_students_qty,
            'special_needs_students_qty' => $request->special_needs_students_qty,
            'total_qty' => $request->total_qty,
            'visitors_qty' => $request->visitors_qty,
            'guest_qty' => $request->guest_qty,
            'workshop_campus' => $request->workshop_campus,
            'workshop_seats' => $request->WorkshopSeat_id,
            'workshop_fixed_asset' => $request->FixedAsset_id,
            'workshop_safety_and_security' => $request->SafetyAndSecurity_id,
            'workshop_safety_and_insurance_protection' => $request->SafetyAndInsuranceProtection_id,
            'workshop_for_accounting' => $request->ForAccounting_id,
            'workshop_rules_and_policies' => $request->RulesAndPolicies_id,
            'status' => $request->status,
        ]);
        return redirect()->route('Workshop.index')
                        ->with('success', 'Information successfully updated.');
    }

    public function destroy($id) {
        $color = Workshop::find($id);
        $color->delete();

        return redirect()->route('Workshop.index')
                        ->with('success', 'Color delete successfully');
    }

    public function details($id) {
        $course_out = Workshop::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Workshop No :</th>';
        $html .= '<td>' . $course_out->workshop_no . '</td></tr>';

        $workshop_type = 'Actual';
        if ($course_out->workshop_type == 2) {
            $workshop_type = 'Virtual';
        }
        $html .= '<tr><th scope="row">Workshop Type:</th>';
        $html .= '<td>' . $workshop_type . '</td></tr>';

        $html .= '<tr><th scope="row"><h3>Occupant Type</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';

        $html .= '<tr><th scope="row">Teacher/ Instructor :</th>';
        $html .= '<td>' . $course_out->teacher_instructor_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Teacher/ Instructor Assistant :</th>';
        $html .= '<td>' . $course_out->teacher_instructor_ssistant_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Typical Student :</th>';
        $html .= '<td>' . $course_out->typical_student_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Handicapped Students:</th>';
        $html .= '<td>' . $course_out->handicapped_students_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Special Needs Students:</th>';
        $html .= '<td>' . $course_out->special_needs_students_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Visitors (Qty):</th>';
        $html .= '<td>' . $course_out->visitors_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Guest (Qty):</th>';
        $html .= '<td>' . $course_out->guest_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Total (Qty):</th>';
        $html .= '<td>' . $course_out->total_qty . '</td></tr>';

        $campus = \App\Models\Campus::where('id', $course_out->workshop_campus)->first();
        $html .= '<tr><th scope="row">Campus:</th>';
        $html .= '<td>' . $campus->name . '</td></tr>';

//        ======================= Workshop Seats ====================
        $html .= '<tr><th scope="row"><h3>Workshop Seats</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';
        $workshop_seats = \App\Models\WorkshopSeats::where('id', $course_out->workshop_seats)->first();
        $html .= '<tr><th scope="row">Seat No:</th>';
        $html .= '<td>' . $workshop_seats->seat_no . '</td></tr>';

        $occu = \App\Models\ClassroomSeatOccupant::where('id', $workshop_seats->occupant)->first();
        $html .= '<tr><th scope="row">Occupant:</th>';
        $html .= '<td>' . $occu->name . '</td></tr>';

        $html .= '<tr><th scope="row">ID No:</th>';
        $html .= '<td>' . $workshop_seats->id_no . '</td></tr>';

        $html .= '<tr><th scope="row">First Name:</th>';
        $html .= '<td>' . $workshop_seats->first_name . '</td></tr>';

        $html .= '<tr><th scope="row">Middle Name:</th>';
        $html .= '<td>' . $workshop_seats->middle_name . '</td></tr>';

        $html .= '<tr><th scope="row">Last Name:</th>';
        $html .= '<td>' . $workshop_seats->last_name . '</td></tr>';

        $html .= '<tr><th scope="row">Photo:</th>';
        $html .= '<td><img src="' . $workshop_seats->photo . '" alt="" class="img-fluid"></td></tr>';

        $html .= '<tr><th scope="row">Phone No:</th>';
        $html .= '<td>' . $workshop_seats->ph_no . '</td></tr>';

        $html .= '<tr><th scope="row">Email:</th>';
        $html .= '<td>' . $workshop_seats->email . '</td></tr>';

        $html .= '<tr><th scope="row">Student Type:</th>';
        $html .= '<td>' . $workshop_seats->student_type . '</td></tr>';

        $html .= '<tr><th scope="row">Seat Status:</th>';
        $html .= '<td>' . $workshop_seats->seat_status . '</td></tr>';


        //        ======================= Fixed Assets ====================
        $html .= '<tr><th scope="row"><h3>Fixed Assets</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';
        $fixed_assets = \App\Models\WorkshopFixedAssets::where('id', $course_out->workshop_fixed_asset)->first();
        $asset_na = \App\Models\AssetName::where('id', $fixed_assets->asset_name)->first();
        $html .= '<tr><th scope="row">Asset Name:</th>';
        $html .= '<td>' . $asset_na->name . '</td></tr>';

        $html .= '<tr><th scope="row">Quantity:</th>';
        $html .= '<td>' . $fixed_assets->quantity . '</td></tr>';

        $html .= '<tr><th scope="row">Name:</th>';
        $html .= '<td>' . $fixed_assets->name . '</td></tr>';

        $html .= '<tr><th scope="row">Model:</th>';
        $html .= '<td>' . $fixed_assets->model . '</td></tr>';

        $color = \App\Models\WorkshopFixedAssets::where('id', $course_out->workshop_fixed_asset)->first();
        $html .= '<tr><th scope="row">Color:</th>';
        $html .= '<td>' . $color->color . '</td></tr>';

        $html .= '<tr><th scope="row">Size:</th>';
        $html .= '<td>' . $fixed_assets->size . '</td></tr>';

        $html .= '<tr><th scope="row">Serial Number:</th>';
        $html .= '<td>' . $fixed_assets->serial_number . '</td></tr>';

        $html .= '<tr><th scope="row">Asset Condition:</th>';
        $html .= '<td>' . $fixed_assets->asset_condition . '</td></tr>';

        $html .= '<tr><th scope="row">Comment:</th>';
        $html .= '<td>' . $fixed_assets->comment . '</td></tr>';

        //        ======================= Safety and Security Devices ====================
        $html .= '<tr><th scope="row"><h3>Safety and Security Devices</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';
        $safety_and_security = \App\Models\WorkshopSafetyAndSecurityDevices::where('id', $course_out->workshop_safety_and_security)->first();
        $safety_it = \App\Models\SafetySecurityItem::where('id', $safety_and_security->safety_item)->first();
        $html .= '<tr><th scope="row">Asset Name:</th>';
        $html .= '<td>' . $safety_it->name . '</td></tr>';

        $cam = \App\Models\Campus::where('id', $safety_and_security->campus)->first();
        $html .= '<tr><th scope="row">Asset Name:</th>';
        $html .= '<td>' . $cam->name . '</td></tr>';

        $html .= '<tr><th scope="row">Quantity:</th>';
        $html .= '<td>' . $safety_and_security->qty . '</td></tr>';

        $html .= '<tr><th scope="row">Serial No:</th>';
        $html .= '<td>' . $safety_and_security->serial_no . '</td></tr>';

        $html .= '<tr><th scope="row">Expiry Date:</th>';
        $html .= '<td>' . $safety_and_security->expiry_date . '</td></tr>';

        $html .= '<tr><th scope="row">Renew Date:</th>';
        $html .= '<td>' . $safety_and_security->renew_date . '</td></tr>';

        $html .= '<tr><th scope="row">Inspection Cycle:</th>';
        $html .= '<td>' . $safety_and_security->inspection_cycle . '</td></tr>';

        $html .= '<tr><th scope="row">Inspection due on:</th>';
        $html .= '<td>' . $safety_and_security->inspection_due_on . '</td></tr>';

        //        ======================= Safety and Insurance Protection ====================
        $html .= '<tr><th scope="row"><h3>Safety and Insurance Protection</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';
        $safety_and_insurance_protection = \App\Models\WorkshopSafetyAndInsuranceProtection::where('id', $course_out->workshop_safety_and_insurance_protection)->first();
        $html .= '<tr><th scope="row">Insurance Type:</th>';
        $html .= '<td>' . $safety_and_insurance_protection->insurance_type . '</td></tr>';

        $html .= '<tr><th scope="row">Staff:</th>';
        $html .= '<td>' . $safety_and_insurance_protection->staff . '</td></tr>';

        $html .= '<tr><th scope="row">Students:</th>';
        $html .= '<td>' . $safety_and_insurance_protection->students . '</td></tr>';

        $html .= '<tr><th scope="row">Fixed Assets:</th>';
        $html .= '<td>' . $safety_and_insurance_protection->fixed_assets . '</td></tr>';

        $html .= '<tr><th scope="row">Property:</th>';
        $html .= '<td>' . $safety_and_insurance_protection->property . '</td></tr>';

        $html .= '<tr><th scope="row">Insurer:</th>';
        $html .= '<td>' . $safety_and_insurance_protection->insurer . '</td></tr>';

        $html .= '<tr><th scope="row">Expiry Date:</th>';
        $html .= '<td>' . $safety_and_insurance_protection->expiry_date . '</td></tr>';

        //        ======================= For Accounting ====================
        $html .= '<tr><th scope="row"><h3>For Accounting</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';
        $ForAccounting = \App\Models\WorkshopForAccounting::where('id', $course_out->workshop_for_accounting)->first();
        $html .= '<tr><th scope="row">Account No:</th>';
        $html .= '<td>' . $ForAccounting->account_no . '</td></tr>';

        $html .= '<tr><th scope="row">Cost Center:</th>';
        $html .= '<td>' . $ForAccounting->cost_center . '</td></tr>';

        $html .= '<tr><th scope="row">Income Center:</th>';
        $html .= '<td>' . $ForAccounting->income_center . '</td></tr>';

        //        ======================= Rules and Policies ====================
        $html .= '<tr><th scope="row"><h3>Rules and Policies</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';
        $rules_and_policies = \App\Models\WorkshopRulesAndPolicies::where('id', $course_out->workshop_rules_and_policies)->first();
        $html .= '<tr><th scope="row">Rules and Policies:</th>';
        $html .= '<td>' . $rules_and_policies->rules_and_policies . '</td></tr>';

        $status = 'In-Active';
        if ($course_out->status == 1) {
            $status = 'Active';
        }
        $html .= '<tr><th scope="row">Status:</th>';
        $html .= '<td>' . $status . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    public function welcome() {
        dd('lll');
    }

}
