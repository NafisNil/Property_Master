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
use App\Models\Assignment;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcement;
use App\Models\UserType;

class AssignmentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $Assignment = Assignment::where('school_id', $school_id)->get();
        $school_info = School::where('id', $school_id)->first();

        return view('assignment.index', compact('school_info', 'Assignment'));
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
        $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('assignment.create', compact('school_info', 'account_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'class_no' => 'required',
        ]);

        Assignment::create($request->all());

        return redirect()->route('Assignment.index')
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
            $Assignment = Assignment::where('id', $id)->first();
            return view('assignment.edit', compact('school_info', 'Assignment'));
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
            'campus_code' => 'required',
        ]);
        $address = array(
            'name' => $request->address_line,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'street' => $request->street,
            'zip' => $request->zip_code,
        );

        $bdirec = Assignment::find($request->id);
        if (isset($bdirec->address) && !empty($bdirec->address)) {
            $addressId = \App\Models\Address::where('id', $bdirec->address)->update($address);
        } else {
            $addressId = \App\Models\Address::create($address);
        }

        $bdirec = Assignment::find($request->id);
        $bdirec->update($request->all());
        $bdirec->update(['address' => $addressId->d]);

        return redirect()->route('assignment.index')
                        ->with('success', 'Information successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $color = Assignment::find($id);
        $color->delete();

        return redirect()->route('assignment.index')
                        ->with('success', 'Color delete successfully');
    }

    public function getUsers(Request $request) {
        $html = '<option value="">---Select----</option>';
//        echo $html;
//        die;
        if ($request->user_type) {
            $user_data = Users::where('user_type', $request->user_type)->orderBy('user_name', 'ASC')->get();
        }
        if(isset($user_data) && !empty($user_data)){
            foreach ($user_data as $row => $val){
                $html .= '<option value="'.$val->id.'">'.$val->user_name.'</option>';
            }
        }
        echo $html;
    }

    public function details($id) {
        $course_out = Assignment::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">Event ID :</th>';
        $html .= '<td>' . $course_out->event_id . '</td></tr>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Post Date & Time :</th>';
        $html .= '<td>' . $course_out->post_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">From Date & Time :</th>';
        $html .= '<td>' . $course_out->from_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">To Date & Time :</th>';
        $html .= '<td>' . $course_out->to_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">Expire Date & Time :</th>';
        $html .= '<td>' . $course_out->expaire_date_time . '</td></tr>';

        $announce = Announcement::where('id', $course_out->title)->first();

        $html .= '<tr><th scope="row">Title:</th>';
        $html .= '<td>' . $announce->name . '</td></tr>';

        $admdip = Department::where('id', $course_out->post_in_admdip)->first();

        $html .= '<tr><th scope="row">Administrative Departments:</th>';
        $html .= '<td>' . $admdip->name . '</td></tr>';

        $acadip = Department::where('id', $course_out->post_in_edudip)->first();

        $html .= '<tr><th scope="row">Educational Departments:</th>';
        $html .= '<td>' . $acadip->name . '</td></tr>';

        $userdip = UserType::where('id', $course_out->post_in_accounthold)->first();

        $html .= '<tr><th scope="row">Account Holders:</th>';
        $html .= '<td>' . $userdip->name . '</td></tr>';

        $html .= '<tr><th scope="row">Comments:</th>';
        $html .= '<td>' . $course_out->comments . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    public function welcome() {
        dd('lll');
    }

}
