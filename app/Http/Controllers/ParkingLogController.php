<?php

namespace App\Http\Controllers;

use App\Models\ParkingLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ParkingLogController extends Controller
{

    function index()
    {

        if (\request()->ajax()) {
            $query = ParkingLog::query();

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view('log.parking.action-button', compact('row'));
                })
                ->make(true);

        }

        return view('log.parking.index');
    }

    function create()
    {
        return view('log.parking.create');
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $validatedData = $request->validate([
            'date' => 'required|date',
            'stall_no' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'make' => 'string',
            'model' => 'string',
            'color' => 'string',
            'plate_no' => 'string',
            'driver_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'purpose_of_visit' => 'string',
        ]);

        $validatedData['school_id'] = $user->school_id;

        // Create a new vehicle record
        ParkingLog::create($validatedData);

        return redirect()->route('parking-logs.index');

    }

    function edit($id)
    {
        $parkingLog = ParkingLog::findOrFail($id);

        return view('log.parking.edit', compact('parkingLog'));
    }

    function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'date' => 'required|date',
            'stall_no' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'make' => 'string',
            'model' => 'string',
            'color' => 'string',
            'plate_no' => 'string',
            'driver_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'purpose_of_visit' => 'string',
        ]);

        $parkingLog = ParkingLog::findOrFail($id);

        $parkingLog->update($validatedData);

        return redirect()->route('parking-logs.index');

    }

    function destroy($id){
        $parkingLog = parkingLog::findOrFail($id);

        $parkingLog->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
