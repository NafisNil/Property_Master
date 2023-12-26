<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    function index()
    {
        $educationLevels = EducationLevel::all();

        return view('admin.education-level.index', compact('educationLevels'));
    }

    function create()
    {
        return view('admin.education-level.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->only([
            'name', 'start_grade', 'end_grade',
            'status', 'description'
        ]);

        EducationLevel::create($data);

        toastr()->success('Added');

        return redirect()->route('admin.education-levels.index');

    }

    function edit($id)
    {
        $educationLevel = EducationLevel::findOrFail($id);

        return view('admin.education-level.edit', compact('educationLevel'));
    }

    function update(Request $request, $id){

        $request->validate([
            'name' => 'required'
        ]);

        $data = $request->only([
            'name', 'start_grade', 'end_grade',
            'status', 'description'
        ]);

        $educationLevel = EducationLevel::findOrFail($id);

        $educationLevel->update($data);

        toastr()->success('Updated');

        return redirect()->route('admin.education-levels.index');
    }

}
