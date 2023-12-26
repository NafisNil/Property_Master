<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Models\SubjectCourse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\SchoolMessage;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcement;
use App\Models\UserType;
use Yajra\DataTables\Facades\DataTables;

class SchoolMessageController extends Controller
{

    public function index()
    {

        if (\request()->ajax()) {
            $user = \auth()->user();
            $query = SchoolMessage::where('school_id', $user->school_id);

            return DataTables::of($query)
                ->addColumn('action', function ($row){
                    return view('school_message.action-buttons', compact('row'));
                })
                ->make(true);

        }

        return view('school_message.index');
    }

    public function create()
    {

        $user = \auth()->user();

        $userTypes = UserType::getForDropdown();
        $courses = SubjectCourse::getForDropdown();

        $school_info = $user->school;
        $priorityLevels = StaticData::getPriorityLevels();

        return view('school_message.create', compact('userTypes', 'school_info', 'courses', 'priorityLevels'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'message_no' => 'required',
            'message_date' => 'required|date',
            'from_user_id' => 'required',
            'to_user_id' => 'required',
            'priority_level' => 'required'
        ]);

        $data = $request->only([
            'message_no', 'message_date', 'from_user_type_id',
            'from_user_id', 'to_user_type_id', 'to_user_id',
            'cc_user_type_id', 'cc_user_id', 'priority_level',
            're', 'subject', 'message'
        ]);

        $user = \auth()->user();

        $data['school_id'] = $user->school_id;

        SchoolMessage::create($data);

        return redirect()->route('SchoolMessage.index')
            ->with('success', 'Information added successfully.');
    }

    function show($id){

        $message = SchoolMessage::with(['fromUserType', 'fromUser', 'toUserType', 'toUser', 'ccUserType', 'ccUser'])->findOrFail($id);
        return view('school_message.show', compact('message', 'id'));
    }

    public function edit($id)
    {

        $message = SchoolMessage::findOrFail($id);

        $user = \auth()->user();

        $userTypes = UserType::getForDropdown();

        $school_info = $user->school;
        $priorityLevels = StaticData::getPriorityLevels();

        $fromUsers = User::where('user_type', $message->from_user_type_id)
            ->get()
            ->pluck('full_name', 'id');

        $toUsers = User::where('user_type', $message->to_user_type_id)
            ->get()
            ->pluck('full_name', 'id');

        $ccUsers = User::where('user_type', $message->cc_user_type_id)
            ->get()
            ->pluck('full_name', 'id');

        return view('school_message.edit', compact('school_info', 'message', 'priorityLevels', 'userTypes', 'fromUsers', 'toUsers', 'ccUsers'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'message_no' => 'required',
            'message_date' => 'required|date',
            'from_user_id' => 'required',
            'to_user_id' => 'required',
            'priority_level' => 'required'
        ]);

        $data = $request->only([
            'message_no', 'message_date', 'from_user_type_id',
            'from_user_id', 'to_user_type_id', 'to_user_id',
            'cc_user_type_id', 'cc_user_id', 'priority_level',
            're', 'subject', 'message'
        ]);

        $message = SchoolMessage::findOrFail($id);

        $message->update($data);

        return redirect()->route('SchoolMessage.index')
            ->with('success', 'Information successfully updated.');
    }

    public function destroy($id)
    {
        $color = SchoolMessage::find($id);
        $color->delete();

        return redirect()->route('school_message.index')
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
        $course_out = SchoolMessage::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Memo No :</th>';
        $html .= '<td>' . $course_out->message_no . '</td></tr>';

        $html .= '<tr><th scope="row">Date and Time:</th>';
        $html .= '<td>' . $course_out->message_date . '</td></tr>';

        $html .= '<tr><th scope="row">Account Type :</th>';
        $html .= '<td>' . $course_out->account_type . '</td></tr>';

        $html .= '<tr><th scope="row">From User Name :</th>';
        $html .= '<td>' . $course_out->from_user_id . '</td></tr>';

        $html .= '<tr><th scope="row">To User Name :</th>';
        $html .= '<td>' . $course_out->to_user_id . '</td></tr>';

        $html .= '<tr><th scope="row">CC User Name :</th>';
        $html .= '<td>' . $course_out->cc_user_id . '</td></tr>';

        $html .= '<tr><th scope="row">Priority Levels :</th>';
        $html .= '<td>' . $course_out->priority_levels . '</td></tr>';

        $sub_cou = \App\Models\CourseOutlines::where('id', $course_out->subject_course)->first();
        $html .= '<tr><th scope="row">Subject/Course :</th>';
        $html .= '<td>' . $sub_cou->name . '</td></tr>';

        $html .= '<tr><th scope="row">Re Case No :</th>';
        $html .= '<td>' . $course_out->re . '</td></tr>';

        $html .= '<tr><th scope="row">Message:</th>';
        $html .= '<td>' . $course_out->message . '</td></tr>';

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
