<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    function index()
    {

        $sections = Section::get();

        return view('academical.section.index', compact('sections'));
    }

    function create()
    {
        return view("academical.section.create");
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate(
            ['name' => 'required']
        );

        $data = $request->only(['name', 'status']);

        $data['school_id'] = $user->school_id;

        Section::create($data);

        return redirect()->route('sections.index');

    }

    function edit($id){
        $section = Section::findOrFailByUniqueId($id);

        return view('academical.section.edit', compact('section'));
    }

    function update(Request $request, $id){

        $user = auth()->user();

        $request->validate(
            ['name' => 'required']
        );

        $section = Section::findOrFailByUniqueId($id);

        $data = $request->only(['name', 'status']);

        $section->update($data);

        toastr()->success('Section Updated Successfully');

        return redirect()->route('sections.index');
    }

    function destroy($id){
        $section = Section::findOrFailByUniqueId($id);
        $section->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }


}
