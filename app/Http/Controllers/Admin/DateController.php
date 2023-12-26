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
use App\Models\Date;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcement;
use App\Models\UserType;

class DateController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $date = Date::select('event_date.*', 'announcent.name AS annTitle')
            ->join('announcent', 'announcent.id', '=', 'event_date.title')
            ->where('event_date.school_id', $school_id)
            ->get();
        $school_info = School::where('id', $school_id)->first();
        return view('date.index', compact('school_info', 'date'));
    }


    public function create()
    {
        $user_id = Auth::user()->id;
        $programs = Programs::where('school_id', $school_id)
            ->orderBy('name', 'ASC')->get();
        $announcment = Announcement::pluck('name', 'id');
        $add_dip = Department::where('type', 1)->pluck('name', 'id');
        $aca_dip = Department::where('type', 2)->pluck('name', 'id');
        $user_type = UserType::where('public', 1)->where('status', 1)->pluck('name', 'id');
        return view('date.create', compact('programs', 'announcment', 'add_dip', 'aca_dip', 'user_type'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
        ]);

        $post_in_edudip = implode(',', $request->post_in_edudip);
        $request->merge(['post_in_edudip' => $post_in_edudip]);

        $post_in_admdip = implode(',', $request->post_in_admdip);
        $request->merge(['post_in_admdip' => $post_in_admdip]);

        $post_in_accounthold = implode(',', $request->post_in_accounthold);
        $request->merge(['post_in_accounthold' => $post_in_accounthold]);
        Date::create($request->all());
        return redirect()->route('Date.index')
            ->with('success', 'Indateation added successfully.');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {
        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school;
            $school_info = School::where('id', $school_id)->first();
            $programs = Programs::where('school_id', $school_id)->orderBy('name', 'ASC')->get();
            $date = Date::where('id', $id)->first();
            $announcment = Announcement::pluck('name', 'id');
            $add_dip = Department::where('type', 1)->pluck('name', 'id');
            $aca_dip = Department::where('type', 2)->pluck('name', 'id');
            $user_type = UserType::where('public', 1)->where('status', 1)->pluck('name', 'id');
            return view('date.edit', compact('school_info', 'date', 'programs', 'announcment', 'add_dip', 'aca_dip', 'user_type'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }


    public function update(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
        ]);

        $post_in_edudip = implode(',', $request->post_in_edudip);
        $request->merge(['post_in_edudip' => $post_in_edudip]);

        $post_in_admdip = implode(',', $request->post_in_admdip);
        $request->merge(['post_in_admdip' => $post_in_admdip]);

        $post_in_accounthold = implode(',', $request->post_in_accounthold);
        $request->merge(['post_in_accounthold' => $post_in_accounthold]);

        $bdirec = Date::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('Date.index')
            ->with('success', 'Indateation successfully updated.');
    }


    public function destroy($id)
    {
        $color = Date::find($id);
        $color->delete();

        return redirect()->route('Date.index')
            ->with('success', 'Color delete successfully');
    }


    public function details($id)
    {
        $course_out = Date::with([
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


        $html .= '<tr><th scope="row">From Date & Time :</th>';
        $html .= '<td>' . $course_out->from_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">To Date & Time :</th>';
        $html .= '<td>' . $course_out->to_date_time . '</td></tr>';


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

        $html .= '<tr><th scope="row">Required Action:</th>';
        $html .= '<td>' . $course_out->required_action . '</td></tr>';

        $html .= '<tr><th scope="row">First Reminder Date & Time :</th>';
        $html .= '<td>' . $course_out->first_reminder_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">Second Reminder Date & Time :</th>';
        $html .= '<td>' . $course_out->second_reminder_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">Third Reminder Date & Time :</th>';
        $html .= '<td>' . $course_out->third_reminder_date_time . '</td></tr>';

        $html .= '<tr><th scope="row">Fourth Reminder Date & Time :</th>';
        $html .= '<td>' . $course_out->fourth_reminder_date_time . '</td></tr>';

        if ($course_out->reminder_method == 2)
            $reminder_met = 'Text Message';
        else
            $reminder_met = 'Email';
        $html .= '<tr><th scope="row">Classroom Category:</th>';
        $html .= '<td>' . $reminder_met . '</td></tr>';

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
