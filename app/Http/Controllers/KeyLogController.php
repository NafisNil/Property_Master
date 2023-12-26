<?php

namespace App\Http\Controllers;

use App\Models\KeyLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KeyLogController extends Controller
{

    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $logs = KeyLog::where('school_id', $user->school);

            return DataTables::of($logs)
                ->addColumn('actions', function ($row) {
                    return view('log.key-log.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('log.key-log.index');
    }

    function create()
    {
        return view('log.key-log.create');
    }

    function show($id)
    {
        $keyLog = KeyLog::findOrFail($id);

        return view('log.key-log.show', compact('keyLog'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $data = $request->only([
            'date', 'purpose', 'stuff_name', 'name',
            'time_in', 'returned_time', 'key_no'
        ]);

        $data['school_id'] = $user->school;

        KeyLog::create($data);

        return redirect()->route('key-logs.index');
    }

    function edit($id)
    {
        $keyLog = KeyLog::findOrFail($id);

        return view('log.key-log.edit', compact('keyLog'));
    }

    function update(Request $request, $id)
    {
        $keyLog = KeyLog::findOrFail($id);

        $data = $request->only([
            'date', 'purpose', 'stuff_name', 'name',
            'time_in', 'returned_time', 'key_no'
        ]);

        $keyLog->update($data);

        return redirect()->route('key-logs.index');

    }

    function destroy($id)
    {
        $keyLog = KeyLog::findOrFail($id);

        $keyLog->delete($id);

        return response()->json(['status' => 'success', 'message' => 'Deleted']);

    }

}
