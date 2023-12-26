<?php

namespace App\Http\Controllers;

use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VisitorLogController extends Controller
{

    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $logs = VisitorLog::where('school_id', $user->school);

            return DataTables::of($logs)
                ->addColumn('actions', function ($row) {
                    return view('log.visitor-log.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('log.visitor-log.index');
    }

    function create()
    {
        return view('log.visitor-log.create');
    }

    function show($id)
    {
        $visitorLog = VisitorLog::findOrFail($id);

        return view('log.visitor-log.show', compact('visitorLog'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $data = $request->only([
            'date', 'purpose', 'visitor_name', 'department',
            'time_in', 'time_out', 'meeting_with'
        ]);

        $data['school_id'] = $user->school;

        VisitorLog::create($data);

        return redirect()->route('visitor-logs.index');
    }

    function edit($id)
    {
        $visitorLog = VisitorLog::findOrFail($id);

        return view('log.visitor-log.edit', compact('visitorLog'));
    }

    function update(Request $request, $id)
    {
        $visitorLog = VisitorLog::findOrFail($id);

        $data = $request->only([
            'date', 'purpose', 'visitor_name', 'department',
            'time_in', 'time_out', 'meeting_with'
        ]);

        $visitorLog->update($data);

        return redirect()->route('visitor-logs.index');

    }

    function destroy($id)
    {
        $visitorLog = VisitorLog::findOrFail($id);

        $visitorLog->delete($id);

        return response()->json(['status' => 'success', 'message' => 'Deleted']);

    }

}
