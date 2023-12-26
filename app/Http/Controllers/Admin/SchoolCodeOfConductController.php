<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use DB;
use App\Models\School;
use App\Models\Users;

class SchoolCodeOfConductController extends Controller
{

    public function index()
    {
        $user = \auth()->user();
        $school_info = $user->school;
        return view('school_code_of_conduct.index', compact('school_info'));
    }

    public function edit($id)
    {

        $school_info = auth()->user()->school;
        return view('school_code_of_conduct.edit', compact('school_info'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'code_of_conduct' => 'required',
        ]);

        $user = auth()->user();
        $school = $user->school;
        $school->code_of_conduct = $request->input('code_of_conduct');
        $school->save();

        return redirect()->route('SchoolCodeOfConduct.index')
            ->with('success', 'Code of Conduct school updated successfully');

    }
}
