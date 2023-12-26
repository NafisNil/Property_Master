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
use App\Models\EducationTeam;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcent;
use App\Models\UserType;
use App\Models\ManageParticipantsInEducationTeam;
use App\Models\ParticipantsAvailabilityAndContactsInEducationTeam;
use App\Models\TaskAssignerInEducationTeam;
use App\Models\ClosingInEducationTeam;
use App\Models\ReopeningInEducationTeam;

class EducationTeamController extends Controller {

    public function index() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $EducationTeam = EducationTeam::where('school_id', $school_id)->get();
        $school_info = School::where('id', $school_id)->first();
        return view('education_team.index', compact('school_info', 'EducationTeam'));
    }

    public function create() {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();
        $account_type = UserType::where('status', 1)
            ->orderBy('name', 'ASC')->get();
        return view('education_team.create', compact('school_info', 'account_type'));
    }

    public function store(Request $request) {
        $request->validate([
            'team_no' => 'required',
        ]);

        $manage_participants = ManageParticipantsInEducationTeam::create([
                    'members' => $request->members,
                    'manage_user_id' => $request->manage_user_id,
                    'invitation_date' => $request->invitation_date,
                    'invitation_message' => $request->invitation_message,
                    'invitation_action' => $request->invitation_action,
                    'manage_status' => $request->manage_status,
                    'status' => $request->status,
        ]);

        /*$participants_availability_and_contacts = ParticipantsAvailabilityAndContactsInEducationTeam::create([
                    'participants_position' => $request->participants_position,
                    'participants_user_id' => $request->participants_user_id,
                    'availability_date_day' => $request->availability_date_day,
                    'participants_phone' => $request->participants_phone,
                    'participants_email' => $request->participants_email,
                    'status' => $request->status,
        ]);*/

        /*$task_assigner = TaskAssignerInEducationTeam::create([
                    'task' => $request->task,
                    'assign_to_user_id' => $request->assign_to_user_id,
                    'assign_to_deadline' => $request->assign_to_deadline,
                    'assign_to_comment' => $request->assign_to_comment,
                    'status' => $request->status,
        ]);*/

        $closing = ClosingInEducationTeam::create([
                    'closing_position' => $request->closing_position,
                    'closing_user_id' => $request->closing_user_id,
                    'closing_email' => $request->closing_email,
                    'closing_message' => $request->closing_message,
                    'closing_date' => $request->closing_date,
                    'closing_reason' => $request->closing_reason,
                    'status' => $request->status,
        ]);

        $reopening = ReopeningInEducationTeam::create([
                    'reopening_position' => $request->reopening_position,
                    'reopening_user_id' => $request->reopening_user_id,
                    'reopening_email' => $request->reopening_email,
                    'reopening_message' => $request->reopening_message,
                    'reopening_date' => $request->reopening_date,
                    'reopening_reason' => $request->reopening_reason,
                    'status' => $request->status,
        ]);

        EducationTeam::create([
            'school_id' => $request->school_id,
            'team_no' => $request->team_no,
            'creation_date' => $request->creation_date,
            'team_closing_date' => $request->team_closing_date,
            'net_operating_days' => $request->net_operating_days,
            'current_status' => $request->current_status,
            'team_group' => $request->team_group,
            'goal' => $request->goal,
            'team_type' => $request->team_type,
            'team_learder_user_id' => $request->team_learder_user_id,
            'education_level' => $request->education_level,
            'about_me' => $request->about_me,
            'team_leader_email' => $request->team_leader_email,
            'team_leader_phone' => $request->team_leader_phone,
            'team_leader_positions' => $request->team_leader_positions,
            'rule_no' => $request->rule_no,
            'rule_description' => $request->rule_description,
            'restrictions_no' => $request->restrictions_no,
            'restrictions_description' => $request->restrictions_description,
            'manage_participants_in_education_team' => $manage_participants->id,
            'closing_in_education_team' => $closing->id,
            'reopening_in_education_team' => $reopening->id,
            'status' => $request->status,
        ]);

        return redirect()->route('EducationTeam.index')
                        ->with('success', 'Information added successfully.');
    }


    public function edit($id) {
        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school;
            $school_info = School::where('id', $school_id)->first();
            $EducationTeam = EducationTeam::where('id', $id)->first();
            $ManageParticipants = ManageParticipantsInEducationTeam::where('id', $EducationTeam->manage_participants_in_education_team)->first();
            $ParticipantsAvailabilityAndContacts = ParticipantsAvailabilityAndContactsInEducationTeam::where('id', $EducationTeam->participants_availability_and_contacts_in_education_team)->first();
            $TaskAssigner = TaskAssignerInEducationTeam::where('id', $EducationTeam->task_assigner_in_education_team)->first();
            $Closing = ClosingInEducationTeam::where('id', $EducationTeam->closing_in_education_team)->first();
            $Reopening = ReopeningInEducationTeam::where('id', $EducationTeam->reopening_in_education_team)->first();
            $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();
            return view('education_team.edit', compact('school_info', 'EducationTeam', 'account_type', 'ManageParticipants', 'ParticipantsAvailabilityAndContacts', 'TaskAssigner', 'Closing', 'Reopening'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }

    public function update(Request $request) {
        $request->validate([
            'team_no' => 'required',
        ]);
        ManageParticipantsInEducationTeam::find($request->ManageParticipants_id)->update([
            'members' => $request->members,
            'manage_user_id' => $request->manage_user_id,
            'invitation_date' => $request->invitation_date,
            'invitation_message' => $request->invitation_message,
            'invitation_action' => $request->invitation_action,
            'manage_status' => $request->manage_status,
            'status' => $request->status,
        ]);
        ParticipantsAvailabilityAndContactsInEducationTeam::find($request->ParticipantsAvailabilityAndContacts_id)->update([
            'participants_position' => $request->participants_position,
            'participants_user_id' => $request->participants_user_id,
            'availability_date_day' => $request->availability_date_day,
            'participants_phone' => $request->participants_phone,
            'participants_email' => $request->participants_email,
            'status' => $request->status,
        ]);
        TaskAssignerInEducationTeam::find($request->TaskAssigner_id)->update([
            'task' => $request->task,
            'assign_to_user_id' => $request->assign_to_user_id,
            'assign_to_deadline' => $request->assign_to_deadline,
            'assign_to_comment' => $request->assign_to_comment,
            'status' => $request->status,
        ]);
        ClosingInEducationTeam::find($request->Closing_id)->update([
            'closing_position' => $request->closing_position,
            'closing_user_id' => $request->closing_user_id,
            'closing_email' => $request->closing_email,
            'closing_message' => $request->closing_message,
            'closing_date' => $request->closing_date,
            'closing_reason' => $request->closing_reason,
            'status' => $request->status,
        ]);
        ReopeningInEducationTeam::find($request->Reopening_id)->update([
            'reopening_position' => $request->reopening_position,
            'reopening_user_id' => $request->reopening_user_id,
            'reopening_email' => $request->reopening_email,
            'reopening_message' => $request->reopening_message,
            'reopening_date' => $request->reopening_date,
            'reopening_reason' => $request->reopening_reason,
            'status' => $request->status,
        ]);
        EducationTeam::find($request->EducationTeam_id)->update([
            'school_id' => $request->school_id,
            'team_no' => $request->team_no,
            'creation_date' => $request->creation_date,
            'team_closing_date' => $request->team_closing_date,
            'net_operating_days' => $request->net_operating_days,
            'current_status' => $request->current_status,
            'team_group' => $request->team_group,
            'goal' => $request->goal,
            'team_type' => $request->team_type,
            'team_learder_user_id' => $request->team_learder_user_id,
            'education_level' => $request->education_level,
            'about_me' => $request->about_me,
            'team_leader_email' => $request->team_leader_email,
            'team_leader_phone' => $request->team_leader_phone,
            'team_leader_positions' => $request->team_leader_positions,
            'rule_no' => $request->rule_no,
            'rule_description' => $request->rule_description,
            'restrictions_no' => $request->restrictions_no,
            'restrictions_description' => $request->restrictions_description,
            'manage_participants_in_education_team' => $request->ManageParticipants_id,
            'participants_availability_and_contacts_in_education_team' => $request->ParticipantsAvailabilityAndContacts_id,
            'task_assigner_in_education_team' => $request->TaskAssigner_id,
            'closing_in_education_team' => $request->Closing_id,
            'reopening_in_education_team' => $request->Reopening_id,
            'status' => $request->status,
        ]);
        return redirect()->route('EducationTeam.index')
                        ->with('success', 'Information successfully updated.');
    }

    public function destroy($id) {
        $color = EducationTeam::find($id);
        $color->delete();
        return redirect()->route('EducationTeam.index')
                        ->with('success', 'Color delete successfully');
    }

    public function getUsers(Request $request) {
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

    public function details($id) {
        $course_out = EducationTeam::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">Team No :</th>';
        $html .= '<td>' . $course_out->team_no . '</td></tr>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Creation Date :</th>';
        $html .= '<td>' . $course_out->creation_date . '</td></tr>';

        $html .= '<tr><th scope="row">Closing Date :</th>';
        $html .= '<td>' . $course_out->closing_date . '</td></tr>';

        $html .= '<tr><th scope="row">Net Operating Days :</th>';
        $html .= '<td>' . $course_out->net_operating_days . '</td></tr>';

        $html .= '<tr><th scope="row">Current Status :</th>';
        $html .= '<td>' . $course_out->current_status . '</td></tr>';

        $team_group = \App\Models\TeamGroup::where('id', $course_out->team_group)->first();
        $html .= '<tr><th scope="row">Team Group:</th>';
        $html .= '<td>' . $team_group->name . '</td></tr>';

        $html .= '<tr><th scope="row">Goal:</th>';
        $html .= '<td>' . $course_out->goal . '</td></tr>';

        $team_type = \App\Models\TeamType::where('id', $course_out->team_type)->first();
        $html .= '<tr><th scope="row">Team Type:</th>';
        $html .= '<td>' . $team_type->name . '</td></tr>';

        //        ======================= Team Leader Profile ====================
        $html .= '<tr><th scope="row"><h3> Team Leader Profile </h3></th>';
        $html .= '<tr><th scope="row">Account Type :</th>';
        $html .= '<td>' . $course_out->team_leader_account_type . '</td></tr>';

        $html .= '<tr><th scope="row">Education Level :</th>';
        $html .= '<td>' . $course_out->education_level . '</td></tr>';

        $html .= '<tr><th scope="row">About Me :</th>';
        $html .= '<td>' . $course_out->about_me . '</td></tr>';

        $html .= '<tr><th scope="row">Email :</th>';
        $html .= '<td>' . $course_out->team_leader_email . '</td></tr>';

        $html .= '<tr><th scope="row">Phone :</th>';
        $html .= '<td>' . $course_out->team_leader_phone . '</td></tr>';

        $html .= '<tr><th scope="row">Positions :</th>';
        $html .= '<td>' . $course_out->team_leader_positions . '</td></tr>';

        $html .= '<tr><th scope="row">Rule No :</th>';
        $html .= '<td>' . $course_out->rule_no . '</td></tr>';

        $html .= '<tr><th scope="row">Rule Description :</th>';
        $html .= '<td>' . $course_out->rule_description . '</td></tr>';

        $html .= '<tr><th scope="row">Restrictions No :</th>';
        $html .= '<td>' . $course_out->restrictions_no . '</td></tr>';

        $html .= '<tr><th scope="row">Restrictions Description :</th>';
        $html .= '<td>' . $course_out->restrictions_description . '</td></tr>';

        $status = 'In-Active';
        if ($course_out->status == 1) {
            $status = 'Active';
        }
        $html .= '<tr><th scope="row">Status:</th>';
        $html .= '<td>' . $status . '</td></tr>';

        $acadip = Department::where('id', $course_out->post_in_edudip)->first();

        $html .= '<tr><th scope="row">Educational Departments:</th>';
        $html .= '<td>' . $acadip->name . '</td></tr>';

        $userdip = UserType::where('id', $course_out->post_in_accounthold)->first();

        $html .= '<tr><th scope="row">Account Holders:</th>';
        $html .= '<td>' . $userdip->name . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    public function welcome() {
        dd('lll');
    }

}
