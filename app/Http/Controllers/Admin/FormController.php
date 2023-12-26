<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Models\FormType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\Form;
use App\Models\UserType;

class FormController extends Controller
{


    public function index()
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $Form = Form::with(['toUser', 'fromUser'])->where('school_id', $school_id)->get();
        $school_info = School::where('id', $school_id)->first();

        return view('form.index', compact('school_info', 'Form'));
    }

    public function create()
    {

        $user = \auth()->user();

        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $userTypes = UserType::getForDropdown();
        $formTypes = FormType::getForDropdown();
        $priorityLevels = StaticData::getPriorityLevels();
        return view('form.create', compact('school_info', 'userTypes', 'formTypes', 'priorityLevels'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'form_no' => 'required',
        ]);

        Form::create($request->all());

        return redirect()->route('Form.index')
            ->with('success', 'Information added successfully.');
    }



    public function edit($id)
    {

        $form = Form::with(['toUser','fromUser', 'type'])->findOrFail($id);

        $user = \auth()->user();

        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $userTypes = UserType::getForDropdown();
        $formTypes = FormType::getForDropdown();
        $priorityLevels = StaticData::getPriorityLevels();

        $fromUsers = User::where('user_type', $form->from_account_type_id)
            ->get()
            ->pluck('full_name', 'id');

        $toUsers = User::where('user_type', $form->to_account_type_id)
            ->get()
            ->pluck('full_name', 'id');

        return view('form.edit', compact('userTypes', 'form', 'formTypes', 'priorityLevels', 'school_info', 'fromUsers', 'toUsers'));


    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'form_no' => 'required',
        ]);

        $form = Form::findOrFail($id);
        $form->update($request->all());
        return redirect()->route('Form.index')
            ->with('success', 'Information successfully updated.');
    }


    public function destroy($id)
    {
        $color = Form::find($id);
        $color->delete();
        return redirect()->route('Form.index')
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
        $form = Form::with(['toUser', 'fromUser','type'])->where('id', $id)->first();

        return view('form.details', compact('form'));
    }


}
