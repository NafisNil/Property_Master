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
use App\Models\SchoolNotice;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcement;
use App\Models\UserType;

class SchoolNoticeController extends BaseController
{

    public function index()
    {
        $this->checkPermission('notice.view');

        $user = \auth()->user();

        $user_id = Auth::user()->id;

        $SchoolNotice = SchoolNotice::where('school_id', $user->school_id)->get();
        $school_info = $user->school;

        if ($user->isStudent() || $user->isTeacher()) {
            $notices = SchoolNotice::where('school_id', $user->school_id)
                ->where(function ($query) use ($user) {
                    $query->where('from_user_id', $user->id)
                        ->orWhere('to_user_id', $user->id);
                })
                ->get();
        }

        return view('school_notice.index', compact('school_info', 'SchoolNotice'));
    }

    public function create()
    {
        $this->checkPermission('notice.create');
        $user = \auth()->user();
        $school_info = $user->school;
        $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('school_notice.create', compact('school_info', 'account_type'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'notice_no' => 'required',
        ]);

        SchoolNotice::create($request->all());

        return redirect()->route('SchoolNotice.index')
            ->with('success', 'Information added successfully.');
    }


    public function edit($id)
    {
        $this->checkPermission('notice.edit');

        if (isset($id) && !empty($id)) {
            $user = \auth()->user();
            $school_info = $user->school;
            $SchoolNotice = SchoolNotice::where('id', $id)->first();
            $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
            return view('school_notice.edit', compact('school_info', 'SchoolNotice', 'account_type'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }

    public function update(Request $request)
    {
        $this->checkPermission('notice.edit');

        $request->validate([
            'notice_no' => 'required',
        ]);

        $bdirec = SchoolNotice::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('SchoolNotice.index')
            ->with('success', 'Information successfully updated.');
    }


    public function destroy($id)
    {
        $this->checkPermission('notice.delete');

        $color = SchoolNotice::find($id);
        $color->delete();

        return redirect()->route('SchoolNotice.index')
            ->with('success', 'Color delete successfully');
    }

    public function getUsers(Request $request)
    {
        $html = '<option value="">---Select----</option>';
        if ($request->user_type) {
            $user_data = Users::where('user_type', $request->user_type)->orderBy('user_name', 'ASC')->get();
        }
        if (isset($user_data) && !empty($user_data)) {
            foreach ($user_data as $row => $val) {
                $html .= '<option value="' . $val->id . '">' . $val->user_name . '</option>';
            }
        }
        echo $html;
    }

    public function details($id)
    {
        $course_out = SchoolNotice::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Notice Type :</th>';
        $html .= '<td>' . $course_out->notice_type . '</td></tr>';

        $html .= '<tr><th scope="row">Notice No :</th>';
        $html .= '<td>' . $course_out->notice_no . '</td></tr>';

        $html .= '<tr><th scope="row">Notice and Time:</th>';
        $html .= '<td>' . $course_out->notice_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">Priority Levels :</th>';
        $html .= '<td>' . $course_out->priority_levels . '</td></tr>';

//        $html .= '<tr><th scope="row">Account Type :</th>';
//        $html .= '<td>' . $course_out->account_type . '</td></tr>';

        $from_user_type = \App\Models\UserType::where('id', $course_out->from_user_id)->first();
        $html .= '<tr><th scope="row">From Account Holder Type :</th>';
        $html .= '<td>' . $from_user_type->name . '</td></tr>';

        $from_user = \App\Models\User::where('id', $course_out->from_user_id)->first();
        $html .= '<tr><th scope="row">From User Name :</th>';
        $html .= '<td>' . $from_user->user_name . '</td></tr>';

//        $to_user_type = \App\Models\UserType::where('id', $course_out->to_user_id)->first();
//        $html .= '<tr><th scope="row">To Account Holder Type :</th>';
//        $html .= '<td>' . $to_user_type->name . '</td></tr>';

        $to_user = \App\Models\User::where('id', $course_out->to_user_id)->first();
        $html .= '<tr><th scope="row">To User Name :</th>';
        $html .= '<td>' . $to_user->user_name . '</td></tr>';
//
//        $cc_user_type = \App\Models\UserType::where('id', $course_out->cc_user_id)->first();
//        $html .= '<tr><th scope="row">CC Account Holder Type :</th>';
//        $html .= '<td>' . $cc_user_type->name . '</td></tr>';

        $cc_user = \App\Models\User::where('id', $course_out->cc_user_id)->first();
        $html .= '<tr><th scope="row">CC User Name :</th>';
        $html .= '<td>' . $cc_user->user_name . '</td></tr>';

        $sub_cou = \App\Models\CourseOutlines::where('id', $course_out->subject)->first();
        $html .= '<tr><th scope="row">Subject :</th>';
        $html .= '<td>' . $sub_cou->name . '</td></tr>';

        $html .= '<tr><th scope="row">Re Case No :</th>';
        $html .= '<td>' . $course_out->re_case_no . '</td></tr>';

        $html .= '<tr><th scope="row">Message:</th>';
        $html .= '<td>' . $course_out->message . '</td></tr>';

        $html .= '<tr><th scope="row">Calendar Date :</th>';
        $html .= '<td>' . $course_out->calendar_date . '</td></tr>';

        $html .= '<tr><th scope="row">Calendar :</th>';
        $html .= '<td>' . $course_out->calendar . '</td></tr>';

        $html .= '<tr><th scope="row">Required Action :</th>';
        $html .= '<td>' . $course_out->required_action . '</td></tr>';

        $html .= '<tr><th scope="row">Comments :</th>';
        $html .= '<td>' . $course_out->comments . '</td></tr>';

        $html .= '<tr><th scope="row">Prepared by :</th>';
        $html .= '<td>' . $course_out->prepare_by . '</td></tr>';

        $html .= '<tr><th scope="row">Approved by:</th>';
        $html .= '<td>' . $course_out->approve_by . '</td></tr>';

        $html .= '<tr><th scope="row">Posted Date :</th>';
        $html .= '<td>' . $course_out->publish_date . '</td></tr>';


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

    public function welcome()
    {
        dd('lll');
    }

}
