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
use App\Models\MarksStructure;
use App\Models\Campus;
use App\Models\CourseOutlines;
use App\Models\AssesmentType;

class MarksStructureController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $marksStructure = MarksStructure::get();
        $school_info = School::where('id', $school_id)->first();
        $assesment_type = AssesmentType::where('status', 1)->get();
        $course = CourseOutlines::where('school_id', $school_id)->where('status', 1)->get();
        return view('marks_structure.index', compact('school_info', 'marksStructure', 'assesment_type', 'course'));
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
        $assesment_type = AssesmentType::where('status', 1)->get();
        $course = CourseOutlines::where('school_id', $school_id)->where('status', 1)->get();
        return view('marks_structure.create', compact('school_info', 'assesment_type', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'assesment_type' => 'required',
        ]);

        MarksStructure::create($request->all());

        return redirect()->route('marksStructure.index')
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
            $marksStructure = MarksStructure::where('id', $id)->first();
            $assesment_type = AssesmentType::where('status', 1)->get();
            $course = CourseOutlines::where('school_id', $school_id)->where('status', 1)->get();
            return view('marks_structure.edit', compact('school_info', 'marksStructure', 'assesment_type', 'course'));
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
            'assesment_type' => 'required',
        ]);
        $bdirec = MarksStructure::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('marksStructure.index')
                        ->with('success', 'Information successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $color = MarksStructure::find($id);
        $color->delete();

        return redirect()->route('marksStructure.index')
                        ->with('success', 'Iformation delete successfully');
    }

}
