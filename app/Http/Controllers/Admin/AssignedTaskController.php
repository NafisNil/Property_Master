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
use App\Models\AssignedTask;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcement;
use App\Models\UserType;

class AssignedTaskController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $AssignedTask = AssignedTask::where('school_id', $school_id)->get();
        $school_info = School::where('id', $school_id)->first();
        return view('assigned_task.index', compact('school_info', 'AssignedTask'));
    }


    public function create() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();
        $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('assigned_task.create', compact('school_info', 'account_type'));
    }


    public function store(Request $request) {

        $request->validate([
            'task_no' => 'required',
        ]);
        AssignedTask::create($request->all());
        return redirect()->route('AssignedTask.index')
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
            $AssignedTask = AssignedTask::where('id', $id)->first();
            $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
            return view('assigned_task.edit', compact('school_info', 'AssignedTask', 'account_type'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }


    public function update(Request $request) {
        $request->validate([
            'task_no' => 'required',
        ]);

        $bdirec = AssignedTask::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('AssignedTask.index')
                        ->with('success', 'Information successfully updated.');
    }

    public function destroy($id) {
        $color = AssignedTask::find($id);
        $color->delete();

        return redirect()->route('assigned_task.index')
                        ->with('success', 'Color delete successfully');
    }

    public function getUsers(Request $request) {
        $html = '<option value="">---Select----</option>';
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
        $course_out = AssignedTask::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Task No :</th>';
        $html .= '<td>' . $course_out->task_no . '</td></tr>';

        $html .= '<tr><th scope="row">Task Date:</th>';
        $html .= '<td>' . $course_out->task_date . '</td></tr>';

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

        $sub_cou = \App\Models\CourseOutlines::where('id', $course_out->subject)->first();
        $html .= '<tr><th scope="row">Subject :</th>';
        $html .= '<td>' . $sub_cou->name . '</td></tr>';

        $html .= '<tr><th scope="row">Message:</th>';
        $html .= '<td>' . $course_out->message . '</td></tr>';

        $html .= '<tr><th scope="row">Instruction :</th>';
        $html .= '<td>' . $course_out->instruction . '</td></tr>';

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

    public function welcome() {
        dd('lll');
    }

}
