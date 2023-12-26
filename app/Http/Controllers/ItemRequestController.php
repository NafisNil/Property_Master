<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\Department;
use App\Models\ItemRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ItemRequestController extends Controller
{
    function index()
    {

        if (\request()->ajax()) {
            $query = ItemRequest::with(['department', 'user']);

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view('item-request.action-button', compact('row'));
                })
                ->make(true);
        }

        return view('item-request.index');
    }

    function create()
    {

        $priorityLevels = StaticData::getPriorityLevels();
        $departments = Department::getForDropdown();
        $users = User::getForDropdown();

        return view('item-request.create', compact('priorityLevels', 'departments', 'users'));
    }

    function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'request_no' => 'required|string',
            'date' => 'required|date',
            'department_id' => 'required|numeric'
        ]);


        $data = $request->only([
            "request_no", "date", "department_id",
            "section", "position", "user_id", "type",
            "priority_level", "description", "status", "comment"
        ]);

        $data['school_id'] = $user->school_id;

        ItemRequest::create($data);

        return redirect()->route("requests.index");
    }

    function edit($id)
    {
        $item = ItemRequest::findOrFail($id);

        $priorityLevels = StaticData::getPriorityLevels();
        $departments = Department::getForDropdown();
        $users = User::getForDropdown();

        return view('item-request.edit', compact('item', 'priorityLevels', 'departments', 'users'));

    }

    function update(Request $request, $id)
    {

        $item = ItemRequest::findOrFail($id);

        $user = auth()->user();

        $request->validate([
            'request_no' => 'required|string',
            'date' => 'required|date',
            'department_id' => 'required|numeric'
        ]);


        $data = $request->only([
            "request_no", "date", "department_id",
            "section", "position", "user_id", "type",
            "priority_level", "description", "status", "comment"
        ]);

        $item->update($data);

        return redirect()->route("requests.index");

    }

    function destroy($id)
    {
        $item = ItemRequest::findOrFail($id);

        $item->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);

    }

}
