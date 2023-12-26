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
use App\Models\InformationSession;
use App\Models\Department;
use App\Models\UserType;

class InformationSessionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $information_session = InformationSession::get();
        $school_info = School::where('id', $school_id)->first();
        return view('information_session.index', compact('school_info', 'information_session'));
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
        $departments = Department::where('status', 1)->orderBy('name', 'ASC')->get();
        $user_role = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('information_session.create', compact('school_info', 'departments', 'user_role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'date' => 'required',
        ]);

        InformationSession::create($request->all());

        return redirect()->route('informationSession.index')
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
            $departments = Department::where('status', 1)->orderBy('name', 'ASC')->get();
            $user_role = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
            $informationSession = InformationSession::where('id', $id)->first();
            return view('information_session.edit', compact('school_info', 'informationSession', 'departments', 'user_role'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information Session Info not found']);
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
            'date' => 'required',
        ]);
        $bdirec = InformationSession::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('informationSession.index')
                        ->with('success', 'Information successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $color = InformationSession::find($id);
        $color->delete();

        return redirect()->route('color.index')
                        ->with('success', 'Color delete successfully');
    }

    public function details($id) {
        $session = InformationSession::where('id', $id)->first();
        $html = '<div class="row">';

        $html .= '<div class="col-md-6">Date:</div>';
        $html .= '<div class="col-md-6">' . $session->date . '</div>';

        $html .= '<div class="col-md-6">Information:</div>';
        $html .= '<div class="col-md-6">' . $session->information . '</div>';

        $dep = Department::where('id', $session->departments)->first();

        $html .= '<div class="col-md-6">Department:</div>';
        $html .= '<div class="col-md-6">' . $dep->name . '</div>';

        $attn = UserType::where('id', $session->who_should_attend)->first();

        $html .= '<div class="col-md-6">Who Should Attend?:</div>';
        $html .= '<div class="col-md-6">' . $attn->name . '</div>';

        $html .= '<div class="col-md-6">Location:</div>';
        $html .= '<div class="col-md-6">' . $session->location . '</div>';

        $html .= '<div class="col-md-6">Time:</div>';
        $html .= '<div class="col-md-6">' . $session->time . '</div>';

        $html .= '<div class="col-md-6">Booking:</div>';
        $html .= '<div class="col-md-6">' . $session->booking . '</div>';

        $html .= '<div class="col-md-6">Add to Calender:</div>';
        $html .= '<div class="col-md-6">' . $session->add_to_calender . '</div>';

        $html .= '<div class="col-md-6">Cotact:</div>';
        $html .= '<div class="col-md-6">' . $session->contact . '</div>';

        $html .= '<div class="col-md-6">Comments:</div>';
        $html .= '<div class="col-md-6">' . $session->comments . '</div>';

        $html .= '</div>';

        return $html;
    }

    public function welcome() {
        dd('lll');
    }

}
