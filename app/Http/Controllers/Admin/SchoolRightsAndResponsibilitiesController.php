<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolRightsAndResponsibilitiesController extends Controller
{

    public function index()
    {
        $user = \auth()->user();
        $school_info = $user->school;
        return view('school_rights_and_responsibilities.index', compact('school_info'));
    }


    public function edit($id)
    {
        $user = auth()->user();
        $school_info = $user->school;
        return view('school_rights_and_responsibilities.edit', compact('school_info'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'rights_and_responsibilities' => 'required',
        ]);

        $user = auth()->user();
        $school = $user->school;

        $school->rights_and_responsibilities = $request->input('rights_and_responsibilities');
        $school->save();

        return redirect()->route('SchoolRightsAndResponsibilities.index')
            ->with('success', 'Code of Conduct school updated successfully');

    }
}
