<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\TemplateBuilder;
use App\Models\UserType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TemplateBuilderController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {

            $templates = TemplateBuilder::with('userType');

            return DataTables::of($templates)
                ->addColumn('action', function ($row) {
                    return view('template-builder.action-button', compact('row'));
                })
                ->make(true);
        }

        return view("template-builder.index");
    }

    function create()
    {

        $templateTypes = StaticData::getTemplateTypes();

        $userTypes = UserType::getForDropdown();

        return view("template-builder.create", compact('templateTypes', 'userTypes'));
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'user_type_id' => 'required'
        ]);

        $data = $request->only(['name', 'type', 'user_type_id']);

        $data['fields'] = $request->input('fields');

        TemplateBuilder::create($data);

        return redirect()->route("templates.index");


    }

    function show($id)
    {
        $template = TemplateBuilder::findOrFail($id);

        return view('template-builder.show', compact('template'));
    }

    function edit($id)
    {
        $template = TemplateBuilder::findOrFail($id);

        $templateTypes = StaticData::getTemplateTypes();

        $userTypes = UserType::getForDropdown();

        return view('template-builder.edit', compact('template', 'templateTypes', 'userTypes'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'user_type_id' => 'required'
        ]);

        $data = $request->only(['name', 'type', 'user_type_id']);

        $data['fields'] = $request->input('fields');

        $template = TemplateBuilder::findOrFail($id);

        $template->upate($data);

        return redirect()->route("templates.index");

    }

    function destroy($id){
        $template = TemplateBuilder::findOrFail($id);
        $template->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
