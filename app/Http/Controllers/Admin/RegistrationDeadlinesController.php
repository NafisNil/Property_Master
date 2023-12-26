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
use App\Models\RegistrationDeadlines;
use App\Models\Campus;
use App\Models\CourseOutlines;

class RegistrationDeadlinesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $registrationDeadlines = RegistrationDeadlines::get();
        $school_info = School::where('id', $school_id)->first();
        return view('registration_deadlines.index', compact('school_info', 'registrationDeadlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();
        return view('registration_deadlines.create', compact('school_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'event_code' => 'required',
        ]);

        RegistrationDeadlines::create($request->all());

        return redirect()->route('registrationDeadlines.index')
                        ->with('success', 'Information added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school;
            $school_info = School::where('id', $school_id)->first();
            $registrationDeadlines = RegistrationDeadlines::where('id', $id)->first();
            return view('registration_deadlines.edit', compact('school_info', 'registrationDeadlines'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $request->validate([
            'event_code' => 'required',
        ]);
        $bdirec = RegistrationDeadlines::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('registrationDeadlines.index')
                        ->with('success', 'Information successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $color = RegistrationDeadlines::find($id);
        $color->delete();

        return redirect()->route('registrationDeadlines.index')
                        ->with('success', 'Iformation delete successfully');
    }

    public function details($id) {
        $classesSchedule = RegistrationDeadlines::where('id', $id)->first();
        $school_info = School::where('id', $classesSchedule->school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">Class No:</th>';
        $html .= '<td>' . $classesSchedule->class_no . '</td></tr>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $camp = Campus::where('id', $classesSchedule->campus)->first();
        $html .= '<tr><th scope="row">Campus:</th>';
        $html .= '<td>' . $camp->name . '</td></tr>';

        $html .= '<tr><th scope="row">From Date:</th>';
        $html .= '<td>' . $classesSchedule->from_date . '</td></tr>';

        $html .= '<tr><th scope="row">To Date:</th>';
        $html .= '<td>' . $classesSchedule->to_date . '</td></tr>';

        $html .= '<tr><th scope="row">From Time:</th>';
        $html .= '<td>' . $classesSchedule->from_time . '</td></tr>';

        $html .= '<tr><th scope="row">To Time:</th>';
        $html .= '<td>' . $classesSchedule->to_time . '</td></tr>';

        $course = CourseOutlines::where('id', $classesSchedule->course_code)->first();
        $html .= '<tr><th scope="row">Subject/ Course Code:</th>';
        $html .= '<td>' . $course->course_code . '</td></tr>';

        $html .= '<tr><th scope="row">Subject/ Course Name:</th>';
        $html .= '<td>' . $course->name . '</td></tr>';

        $teacher = Users::where('id', $classesSchedule->teacher_instructor_name)->first();
        $html .= '<tr><th scope="row">Teacher/ Instructor Name:</th>';
        $html .= '<td>' . $teacher->user_name . '</td></tr>';

        $status = 'In-Active';
        if (isset($classesSchedule->status) && $classesSchedule->status == 1) {
            $status = 'Actie';
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
