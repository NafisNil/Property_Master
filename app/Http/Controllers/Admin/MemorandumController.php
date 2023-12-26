<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Models\FormType;
use App\Models\MemorandumRecipient;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Users;
use App\Models\Memorandum;
use App\Models\Department;
use App\Models\Programs;
use App\Models\Announcement;
use App\Models\UserType;

class MemorandumController extends Controller
{

    public function index()
    {
        $user = \auth()->user();
        $Memorandum = Memorandum::where('school_id', $user->school_id)->get();
        $school_info = $user->school;

        return view('memorandum.index', compact('school_info', 'Memorandum'));
    }

    public function create()
    {
        $user = \auth()->user();

        $userTypes = UserType::getForDropdown();

        $priorityLevels = StaticData::getPriorityLevels();

        $departments = Department::getForDropdown();

        $users = User::getForDropdown();

        return view('memorandum.create', compact('userTypes', 'priorityLevels', 'departments', 'users'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'memo_no' => 'required',
            'date' => 'required',
            'priority_level' => 'required',
            'from_department_id' => 'required',
        ]);

        DB::beginTransaction();

        //dd($request->all());

        try {

            $fromData = [
                'department_id' => $request->input('from_department_id'),
                'section' => $request->input('from_section'),
                'position' => $request->input('from_position'),
                'user_id' => $request->input('from_user_id'),
            ];

            $from = MemorandumRecipient::create($fromData);

            $toData = [
                'department_id' => $request->input('to_department_id'),
                'section' => $request->input('to_section'),
                'position' => $request->input('to_position'),
                'user_id' => $request->input('to_user_id'),
            ];

            $to = MemorandumRecipient::create($toData);

            $ccData = [
                'department_id' => $request->input('cc_department_id'),
                'section' => $request->input('cc_section'),
                'position' => $request->input('cc_position'),
                'user_id' => $request->input('cc_user_id'),
            ];

            $cc = MemorandumRecipient::create($ccData);

            $memorandum = Memorandum::create([
                'memo_no' => $request->input('memo_no'),
                'date' => $request->input('date'),
                'priority_level' => $request->input('priority_level'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
                'action-date' => $request->input('action_date'),
                'from_id' => $from->id,
                'to_id' => $to->id,
                'cc_id' => $cc->id,
                'school_id' => \auth()->user()->school_id,
            ]);

            foreach ($request->input('recipients') as $recipient) {
                MemorandumRecipient::create([
                    'department_id' => $recipient['department_id'],
                    'section' => $recipient['section'],
                    'position' => $recipient['position'],
                    'user_id' => $recipient['user_id'],
                    'memorandum_id' => $memorandum->id
                ]);
            }

            DB::commit();

            return redirect()->route('Memorandum.index')
                ->with('success', 'Information added successfully.');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->withErrors(['message' => $exception->getMessage()]);
        }
    }


    public function edit($id)
    {

        $user = \auth()->user();

        $priorityLevels = StaticData::getPriorityLevels();

        $users = User::getForDropdown();

        $departments = Department::getForDropdown();

        $memo = Memorandum::with(['to.department', 'to.user', 'from.department', 'from.user', 'cc.department', 'cc.user', 'recipients.department', 'recipients.user'])->findOrfail($id);

        return view('memorandum.edit', compact('memo', 'priorityLevels', 'users', 'departments'));

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'memo_no' => 'required',
        ]);

        DB::beginTransaction();

        $memo = Memorandum::findOrFail($id);

        try {

            $fromData = [
                'department_id' => $request->input('from_department_id'),
                'section' => $request->input('from_section'),
                'position' => $request->input('from_position'),
                'user_id' => $request->input('from_user_id'),
            ];

            $memo->from->update($fromData);

            $toData = [
                'department_id' => $request->input('to_department_id'),
                'section' => $request->input('to_section'),
                'position' => $request->input('to_position'),
                'user_id' => $request->input('to_user_id'),
            ];

            $memo->to->update($toData);

            $ccData = [
                'department_id' => $request->input('cc_department_id'),
                'section' => $request->input('cc_section'),
                'position' => $request->input('cc_position'),
                'user_id' => $request->input('cc_user_id'),
            ];

            $memo->cc->update($ccData);

            $memo->update([
                'memo_no' => $request->input('memo_no'),
                'date' => $request->input('date'),
                'priority_level' => $request->input('priority_level'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
                'action-date' => $request->input('action_date'),
            ]);

            $memo->recipients()->delete();

            foreach ($request->input('recipients') as $recipient) {
                MemorandumRecipient::create([
                    'department_id' => $recipient['department_id'],
                    'section' => $recipient['section'],
                    'position' => $recipient['position'],
                    'user_id' => $recipient['user_id'],
                    'memorandum_id' => $memo->id
                ]);
            }

            DB::commit();

            return redirect()->route('Memorandum.index')
                ->with('success', 'Information updated successfully.');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $color = Memorandum::find($id);
        $color->delete();

        return redirect()->route('memorandum.index')
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
        $memo = Memorandum::with(['to.department', 'to.user', 'from.department', 'from.user', 'cc.department', 'cc.user', 'recipients.department', 'recipients.user'])->findOrfail($id);

        return view("memorandum.show", compact('memo'));
    }

}
