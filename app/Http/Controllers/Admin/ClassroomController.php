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
use App\Models\Classroom;
use App\Models\ClassroomType;


class ClassroomController extends Controller {

    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $Classroom = Classroom::where('school_id', $school_id)->get();
        $school_info = School::where('id', $school_id)->first();
        return view('Classroom.index', compact('school_info', 'Classroom'));
    }

    public function create() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();
        return view('Classroom.create', compact('school_info'));
    }

    public function store(Request $request) {

        $request->validate([
            'classroom_no' => 'required',
        ]);
        Classroom::create($request->all());
        return redirect()->route('Classroom.index')
                        ->with('success', 'Information added successfully.');
    }

    public function edit($id) {
        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school_id;
            $school_info = School::where('id', $school_id)->first();
            $Classroom = Classroom::where('id', $id)->first();
            return view('Classroom.edit', compact('school_info', 'Classroom'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'classroom_no' => 'required',
        ]);
        $bdirec = Classroom::find($request->id);
        $bdirec->update($request->all());
        return redirect()->route('Classroom.index')
                        ->with('success', 'Information successfully updated.');
    }

    public function destroy($id) {
        $color = Classroom::find($id);
        $color->delete();
        return redirect()->route('Classroom.index')
                        ->with('success', 'Color delete successfully');
    }

    public function details($id) {
        $course_out = Classroom::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Classroom No :</th>';
        $html .= '<td>' . $course_out->classroom_no . '</td></tr>';

        $classroom_category = 'Virtual';
        if ($course_out->classroom_category == 1) { $classroom_category = 'Actual'; }
        $html .= '<tr><th scope="row">Classroom Category :</th>';
        $html .= '<td>' . $classroom_category . '</td></tr>';

        $classroom_type = ClassroomType::where('id', $course_out->classroom_type)->first();
        $html .= '<tr><th scope="row">Classroom type :</th>';
        $html .= '<td>' . $classroom_type->name . '</td></tr>';

        $html .= '<tr><th scope="row"><h3>Occupant Type</h3></th>';
        $html .= '<th scope="row"><h3>Qty</h3></th></tr>';

        $html .= '<tr><th scope="row">Teacher/ Instructor :</th>';
        $html .= '<td>' . $course_out->teacher_instructor_qty . '</td></tr>';

        $html .= '<tr><th scope="row">Teacher/ Instructor Assistant :</th>';
        $html .= '<td>' . $course_out->teacher_instructor_assistant_qty . '</td></tr>';

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

        $campus = \App\Models\Campus::where('id', $course_out->campus)->first();
        $html .= '<tr><th scope="row">Campus:</th>';
        $html .= '<td>' . $campus->name . '</td></tr>';

        $status = 'In-Active';
        if ($course_out->status == 1) { $status = 'Active'; }
        $html .= '<tr><th scope="row">Status:</th>';
        $html .= '<td>' . $status . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

}
