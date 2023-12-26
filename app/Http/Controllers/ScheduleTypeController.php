<?php

namespace App\Http\Controllers;

use App\Models\ScheduleType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ScheduleTypeController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {

            $scheduleTypes = ScheduleType::query();

            return DataTables::of($scheduleTypes)
                ->addColumn('action', function ($row) {
                    return view("schedule.type.action-button", compact('row'));
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return "<span class='badge badge-primary'>Active</span>";
                    }
                    return "<span class='badge badge-warning'>In-Active</span>";
                })
                ->rawColumns(['action', 'status'])
                ->make(true);

        }

        return view("schedule.type.index");
    }

    function create()
    {
        return view('schedule.type.create');
    }

    function store()
    {

        $user = auth()->user();

        \request()->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);

        ScheduleType::create([
            'name' => \request()->input('name'),
            'status' => \request()->input('status'),
            'school_id' => $user->school_id
        ]);

        return redirect()->route('schedule-types.index');

    }

    function edit($id)
    {
        $scheduleType = ScheduleType::findOrFail($id);

        return view('schedule.type.edit', compact('scheduleType'));
    }

    function update($id)
    {
        \request()->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);

        $scheduleType = ScheduleType::findOrFail($id);

        $scheduleType->update([
            'name' => \request()->input('name'),
            'status' => \request()->input('status'),
        ]);

        return redirect()->route('schedule-types.index');
    }

    function destroy($id)
    {
        $scheduleType = ScheduleType::findOrFail($id);
        $scheduleType->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
