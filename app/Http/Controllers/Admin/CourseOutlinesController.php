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
use App\Models\CourseOutlines;
use App\Models\Department;
use App\Models\Programs;

class CourseOutlinesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $courseOutlines = CourseOutlines::get();
        $school_info = School::where('id', $school_id)->first();
        return view('course_outlines.index', compact('school_info', 'courseOutlines'));
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
        $programs = Programs::where('school_id', $school_id)->orderBy('name', 'ASC')->get();
        return view('course_outlines.create', compact('school_info', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
        ]);

        CourseOutlines::create($request->all());

        return redirect()->route('courseOutlines.index')
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
            $programs = Programs::where('school_id', $school_id)->orderBy('name', 'ASC')->get();
            $courseOutlines = CourseOutlines::where('id', $id)->first();
            return view('course_outlines.edit', compact('school_info', 'courseOutlines', 'programs'));
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
            'name' => 'required',
        ]);
        $bdirec = CourseOutlines::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('courseOutlines.index')
                        ->with('success', 'Information successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $color = CourseOutlines::find($id);
        $color->delete();

        return redirect()->route('color.index')
                        ->with('success', 'Color delete successfully');
    }

    public function details($id) {
        $course_out = CourseOutlines::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">Course Code - Name :</th>';
        $html .= '<td>' . $course_out->name . '</td></tr>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $dep = Programs::where('id', $course_out->program)->first();

        $html .= '<tr><th scope="row">Department:</th>';
        $html .= '<td>' . $dep->name . '</td></tr>';

        $html .= '<tr><th scope="row">Prerequisite(s):</th>';
        $html .= '<td>' . $course_out->prerequisites . '</td></tr>';

        $html .= '<tr><th scope="row">From Date:</th>';
        $html .= '<td>' . $course_out->from_date . '</td></tr>';

        $html .= '<tr><th scope="row">To Date:</th>';
        $html .= '<td>' . $course_out->to_date . '</td></tr>';

        $html .= '<tr><th scope="row">Total Classes:</th>';
        $html .= '<td>' . $course_out->total_class . '</td></tr>';

        $html .= '<tr><th scope="row">Total Weeks:</th>';
        $html .= '<td>' . $course_out->total_week . '</td></tr>';

        $html .= '<tr><th scope="row">Total Hours:</th>';
        $html .= '<td>' . $course_out->total_hour . '</td></tr>';

        $html .= '<tr><th scope="row">Credits:</th>';
        $html .= '<td>' . $course_out->credits . '</td></tr>';

        $html .= '<tr><th scope="row">Passing Grade:</th>';
        $html .= '<td>' . $course_out->passing_grade . '</td></tr>';

        $html .= '<tr><th scope="row">Tuition Domestic:</th>';
        $html .= '<td>' . $course_out->tuition_domestic . '</td></tr>';

        $html .= '<tr><th scope="row">Tuition International:</th>';
        $html .= '<td>' . $course_out->tuition_international . '</td></tr>';

        $html .= '<tr><th scope="row">Tuition Special Needs:</th>';
        $html .= '<td>' . $course_out->tuition_special_needs . '</td></tr>';

        $html .= '<tr><th scope="row">Requirements:</th>';
        $html .= '<td>' . $course_out->requirements . '</td></tr>';

        $html .= '<tr><th scope="row">Available:</th>';
        $html .= '<td>' . $course_out->available . '</td></tr>';

        $html .= '<tr><th scope="row">Cotact:</th>';
        $html .= '<td>' . $course_out->contact . '</td></tr>';

        $html .= '<tr><th scope="row">Apply:</th>';
        $html .= '<td>' . $course_out->apply . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    public function welcome() {
        dd('lll');
    }

}
