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

class SchoolRulesPoliciesAndProceduresController extends Controller
{
    public function index()
    {
        $user = \auth()->user();
        $school = $user->school;
        return view('school_rules_policies_and_procedures.index', compact('school'));
    }


    public function create()
    {
        $id = Auth::id();
        return view('colors.create');
    }


    public function update(Request $request)
    {
        $request->validate([
            'rules' => 'required',
            'policies' => 'required',
            'procedures' => 'required',
        ]);

        $user = \auth()->user();

        $school = $user->school;

        $school->rules = $request->input('rules');
        $school->policies = $request->input('policies');
        $school->procedures = $request->input('procedures');
        $school->save();

        return redirect()->route('SchoolRulesPoliciesAndProcedures.index')
            ->with('success', 'Code of Conduct school updated successfully');

    }

}
