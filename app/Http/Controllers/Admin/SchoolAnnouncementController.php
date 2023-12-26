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
use App\Models\SchoolAnnouncement;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcement;
use App\Models\UserType;

class SchoolAnnouncementController extends Controller {

    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $schoolAnnouncment = SchoolAnnouncement::select('school_announcement.*', 'announcent.name AS annTitle')
                ->join('announcent', 'announcent.id', '=', 'school_announcement.title')
                ->get();
        $school_info = School::where('id', $school_id)->first();
        return view('school_announcement.index', compact('school_info', 'schoolAnnouncment'));
    }


    public function create() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();
        $programs = Programs::where('school_id', $school_id)->orderBy('name', 'ASC')->get();
        $announcment = Announcement::pluck('name', 'id');
        $aca_dip = Department::where('type', 2)->pluck('name', 'id');
        $add_dip = Department::where('type', 1)->pluck('name', 'id');
        $user_type = UserType::where('public', 1)->where('status', 1)->pluck('name', 'id');
        return view('school_announcement.create', compact('school_info', 'programs', 'announcment', 'add_dip', 'aca_dip', 'user_type'));
    }


    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
        ]);
        $post_in_edudip = implode(',', $request->post_in_edudip);
        $request->merge(['post_in_edudip' => $post_in_edudip]);

        $post_in_admdip = implode(',', $request->post_in_admdip);
        $request->merge(['post_in_admdip' => $post_in_admdip]);

        $post_in_accounthold = implode(',', $request->post_in_accounthold);
        $request->merge(['post_in_accounthold' => $post_in_accounthold]);

//        dd($request);
        SchoolAnnouncement::create($request->all());
        return redirect()->route('schoolAnnouncment.index')
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
            $programs = Programs::where('school_id', $school_id)->orderBy('name', 'ASC')->get();
            $schoolAnnouncment = SchoolAnnouncement::where('id', $id)->first();
            $announcment = Announcement::pluck('name', 'id');
            $aca_dip = Department::where('type', 2)->pluck('name', 'id');
            $add_dip = Department::where('type', 1)->pluck('name', 'id');
            $user_type = UserType::where('public', 1)->where('status', 1)->pluck('name', 'id');
            return view('school_announcement.edit', compact('school_info', 'schoolAnnouncment', 'programs', 'announcment', 'add_dip', 'aca_dip', 'user_type'));
        }
        else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }


    public function update(Request $request) {
        $request->validate([
            'title' => 'required',
        ]);
//        $request->post_date_time = strtotime($request->post_date_time);
//        $request->from_date_time = strtotime($request->from_date_time);
//        $request->to_date_time = strtotime($request->to_date_time);
//        $request->expaire_date_time = strtotime($request->expaire_date_time);
        $post_in_edudip = implode(',', $request->post_in_edudip);
        $request->merge(['post_in_edudip' => $post_in_edudip]);

        $post_in_admdip = implode(',', $request->post_in_admdip);
        $request->merge(['post_in_admdip' => $post_in_admdip]);

        $post_in_accounthold = implode(',', $request->post_in_accounthold);
        $request->merge(['post_in_accounthold' => $post_in_accounthold]);

        $bdirec = SchoolAnnouncement::find($request->id);
        $bdirec->update($request->all());
        return redirect()->route('schoolAnnouncment.index')
                        ->with('success', 'Information successfully updated.');
    }



    public function destroy($id) {
        $color = SchoolAnnouncement::find($id);
        $color->delete();
        return redirect()->route('school_announcement.index')
                        ->with('success', 'Color delete successfully');
    }


    public function details($id) {
        $course_out = SchoolAnnouncement::with([
            'announcement_title', 'educational_departments', 'administrative_departments', 'Usertype_account_holders'])->where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $educationDepartments_Id = $course_out->post_in_edudip;
        $educationDepartments = Department::whereIn('id',explode(',', $educationDepartments_Id) )
            ->pluck('name')
            ->toArray();

        $administrativeDepartments_Id = $course_out->post_in_admdip;
        $administrativeDepartments = Department::whereIn('id',explode(',', $administrativeDepartments_Id) )
            ->pluck('name')
            ->toArray();

        $accountHolders_ID = $course_out->post_in_accounthold;
        $accountHolders = UserType::whereIn('id',explode(',', $accountHolders_ID) )
            ->pluck('name')
            ->toArray();

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

        $html .= '<tr><th scope="row">Title:</th>';
        $html .= '<td>' . $course_out->announcement_title->name . '</td></tr>';

        $html .= '<tr><th scope="row">Educational Departments:</th>';
        $html .= '<td>' . implode(',', $educationDepartments) . '</td></tr>';

        $html .= '<tr><th scope="row">Administrative Departments:</th>';
        $html .= '<td>' . implode(',', $administrativeDepartments) . '</td></tr>';

        $html .= '<tr><th scope="row">Account Holders:</th>';
        $html .= '<td>' . implode(',', $accountHolders) . '</td></tr>';

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
