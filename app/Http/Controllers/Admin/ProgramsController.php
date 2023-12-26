<?php

namespace App\Http\Controllers\Admin;

use App\Models\SchoolProgram;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\Programs;
use App\Models\Department;
use App\Models\UserType;
use App\Models\EducationLevel;
use App\Models\Credential;
use App\Models\StudyOption;
use App\Models\DeliveryMethod;

class ProgramsController extends Controller {


    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $programs = SchoolProgram::get();
        $school_info = School::where('id', $school_id)->first();
        return view('programs.index', compact('school_info', 'programs'));
    }


    public function create() {
        $user_id = Auth::user()->id;
        $school_id = User::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();
        $departments = Department::where('status', 1)->orderBy('name', 'ASC')->get();
        $school_level = EducationLevel::where('status', 1)->get();
        $credential = Credential::where('status', 1)->get();
        $study_option = StudyOption::where('status', 1)->get();
        $delivery_mmethod = DeliveryMethod::where('status', 1)->get();

        return view('programs.create', compact('school_info', 'departments', 'school_level', 'credential', 'study_option', 'delivery_mmethod'));
    }


    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
        ]);

        Programs::create($request->all());

        return redirect()->route('Programs.index')
                        ->with('success', 'Information added successfully.');
    }


    public function edit($id) {
        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school_id;
            $school_info = School::where('id', $school_id)->first();
            $departments = Department::where('status', 1)->orderBy('name', 'ASC')->get();
            $school_level = EducationLevel::where('status', 1)->get();
            $credential = Credential::where('status', 1)->get();
            $study_option = StudyOption::where('status', 1)->get();
            $delivery_mmethod = DeliveryMethod::where('status', 1)->get();
            $Programs = Programs::where('id', $id)->first();
            return view('programs.edit', compact('school_info', 'Programs', 'departments', 'school_level', 'credential', 'study_option', 'delivery_mmethod'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Data not found']);
        }
    }


    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        $bdirec = Programs::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('Programs.index')
                        ->with('success', 'Information successfully updated.');
    }


    public function destroy($id) {
        $color = Programs::find($id);
        $color->delete();

        return redirect()->route('color.index')
                        ->with('success', 'Color delete successfully');
    }

    public function details($id) {
        $programs = Programs::where('id', $id)->first();

        $html = '<div class="row">';

        $html .= '<div class="col-md-6">Code:</div>';
        $html .= '<div class="col-md-6">' . $programs->code . '</div>';

        $html .= '<div class="col-md-6">Name:</div>';
        $html .= '<div class="col-md-6">' . $programs->name . '</div>';

        $creden = Credential::where('id', $programs->credential)->first();
        $html .= '<div class="col-md-6">Credential:</div>';
        $html .= '<div class="col-md-6">' . $creden->name . '</div>';

        $sop = StudyOption::where('id', $programs->study_option)->first();
        $html .= '<div class="col-md-6">Study Option:</div>';
        $html .= '<div class="col-md-6">' . $sop->name . '</div>';

        $dep = Department::where('id', $programs->department)->first();
        $html .= '<div class="col-md-6">Department:</div>';
        $html .= '<div class="col-md-6">' . $dep->name . '</div>';

        $dm = DeliveryMethod::where('id', $programs->delivery_method)->first();

        $html .= '<div class="col-md-6">Delivery Method:</div>';
        $html .= '<div class="col-md-6">' . $dm->name . '</div>';

        $html .= '<div class="col-md-6">Duration/Weeks:</div>';
        $html .= '<div class="col-md-6">' . $programs->duration_weeks . '</div>';

        $html .= '<div class="col-md-6">Subjects/Courses:</div>';
        $html .= '<div class="col-md-6">' . $programs->subjects_courses . '</div>';
        $html .= '</div>';

        $html .= '<div class="row">';

        $html .= '<div class="col-md-12"><strong>Program Cost for:</strong></div>';

        $html .= '<div class="col-md-6">Special Needs:</div>';
        $html .= '<div class="col-md-6">' . $programs->special_needs . '</div>';

        $html .= '<div class="col-md-6">Handicap:</div>';
        $html .= '<div class="col-md-6">' . $programs->handicap . '</div>';

        $html .= '<div class="col-md-6">Domestic:</div>';
        $html .= '<div class="col-md-6">' . $programs->domestic . '</div>';

        $html .= '<div class="col-md-6">International:</div>';
        $html .= '<div class="col-md-6">' . $programs->international . '</div>';

        $html .= '</div>';

        $html .= '<div class="row">';

        $html .= '<div class="col-md-6">Requirements:</div>';
        $html .= '<div class="col-md-6">' . $programs->requirements . '</div>';

        $html .= '<div class="col-md-6">Available:</div>';
        $html .= '<div class="col-md-6">' . $programs->available . '</div>';

        $html .= '<div class="col-md-6">Contact:</div>';
        $html .= '<div class="col-md-6">' . $programs->contact . '</div>';

        $html .= '<div class="col-md-6">Apply:</div>';
        $html .= '<div class="col-md-6">' . $programs->apply . '</div>';

        $html .= '</div>';

        return $html;
    }
}
