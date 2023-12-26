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
use App\Models\Address;
use App\Models\StaffDirectory;

class StaffDirectoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $staff_directory = StaffDirectory::get();
        $school_info = School::where('id', $school_id)->first();
        return view('staff_directory.index', compact('school_info', 'staff_directory'));
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
        return view('staff_directory.create', compact('school_info'));
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

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fnae = 'dir-' . $request->school_id . '-' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'public/images/staff/';
            $file->move($destinationPath, $fnae);
            $destin_path = $destinationPath . $fnae;
        }

        $dir_id = StaffDirectory::create($request->all())->id;
        if ($destin_path) {
            StaffDirectory::where('id', $dir_id)->update(['photo' => $destin_path]);
        }

        return redirect()->route('staffDirectory.index')
                        ->with('success', 'Board of director created successfully.');
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

            $staffinfo = StaffDirectory::where('id', $id)->first();
            return view('staff_directory.edit', compact('school_info', 'staffinfo'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Director Info not found']);
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

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $fnae = 'dir-' . $request->school_id . '-' . time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'public/images/staff/';
            $file->move($destinationPath, $fnae);
            $destin_path = $destinationPath . $fnae;
        }
        $bdirec = StaffDirectory::find($request->id);
        $strData = $request->all();
        $bdirec->update($strData);
        if ($destin_path) {
            StaffDirectory::where('id', $request->id)->update(['photo' => $destin_path]);
        }

        return redirect()->route('staffDirectory.index')
                        ->with('success', 'Board of director created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $color = StaffDirectory::find($id);
        $color->delete();

        return redirect()->route('color.index')
                        ->with('success', 'Color delete successfully');
    }

    public function details($id) {
        $director = StaffDirectory::where('id', $id)->first();
        $html = '<div class="row">';
        $html .= '<div class="col-md-8">';
        $html .= '<div class="row">';

        $html .= '<div class="col-md-6">Staf ID:</div>';
        $html .= '<div class="col-md-6">' . $director->staff_id . '</div>';

        $html .= '<div class="col-md-6">Name:</div>';
        $html .= '<div class="col-md-6">' . $director->name . '</div>';

        $html .= '<div class="col-md-6">Nick Name:</div>';
        $html .= '<div class="col-md-6">' . $director->nick_name . '</div>';

        $html .= '<div class="col-md-6">Educational Level:</div>';
        $html .= '<div class="col-md-6">' . $director->educational_level . '</div>';

        $html .= '<div class="col-md-6">University Name:</div>';
        $html .= '<div class="col-md-6">' . $director->university_name . '</div>';

        $html .= '<div class="col-md-12" style="margin-top: 20px;"><h4><strong>Contact</strong></h4></div>';
        $html .= '<div class="col-md-6">Years in Field:</div>';
        $html .= '<div class="col-md-6">' . $director->years_in_field . '</div>';

        $html .= '<div class="col-md-6">Phone Office:</div>';
        $html .= '<div class="col-md-6">' . $director->phone_office . '</div>';

        $html .= '<div class="col-md-6">Phone Cell:</div>';
        $html .= '<div class="col-md-6">' . $director->phone_cell . '</div>';

        $html .= '<div class="col-md-6">Email:</div>';
        $html .= '<div class="col-md-6">' . $director->email . '</div>';

        $html .= '<div class="col-md-6">Fax:</div>';
        $html .= '<div class="col-md-6">' . $director->fax . '</div>';
        
        $html .= '<div class="col-md-6">Designation:</div>';
        $html .= '<div class="col-md-6">' . $director->designation . '</div>';

        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="col-md-4"><img class="img-fluid" src="' . $director->photo . '"></div>';
        $html .= '</div>';

        return $html;
    }

    public function welcome() {
        dd('lll');
    }

}
