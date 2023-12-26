<?php

namespace App\Http\Controllers;

use App\Models\MailLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MailLogController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $logs = MailLog::where('school_id', $user->school);

            return DataTables::of($logs)
                ->addColumn('actions', function ($row) {
                    return view('log.mail-log.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('log.mail-log.index');
    }

    function create()
    {
        return view('log.mail-log.create');
    }

    function show($id)
    {
        $mailLog = MailLog::findOrFail($id);

        return view('log.mail-log.show', compact('mailLog'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $data = $request->only([
            'date', 'tracking_no', 'sender', 'recipient',
            'employee_name', 'description', 'date_received',
        ]);

        $data['school_id'] = $user->school;

        MailLog::create($data);

        return redirect()->route('mail-logs.index');
    }

    function edit($id)
    {
        $mailLog = MailLog::findOrFail($id);

        return view('log.mail-log.edit', compact('mailLog'));
    }

    function update(Request $request, $id)
    {
        $mailLog = MailLog::findOrFail($id);

        $data = $request->only([
            'date', 'tracking_no', 'sender', 'recipient',
            'employee_name', 'description', 'date_received',
        ]);

        $mailLog->update($data);

        return redirect()->route('mail-logs.index');

    }

    function destroy($id)
    {
        $mailLog = MailLog::findOrFail($id);

        $mailLog->delete($id);

        return response()->json(['status' => 'success', 'message' => 'Deleted']);

    }
}
