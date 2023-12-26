<?php

namespace App\Http\Controllers;

use App\Models\CarMileageLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CarMileageLogController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $carMileages = CarMileageLog::where('school_id', $user->school);

            return DataTables::of($carMileages)
                ->addColumn('actions', function ($row) {
                    return view('log.car-mileage.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('log.car-mileage.index');
    }

    function create()
    {
        return view('log.car-mileage.create');
    }

    function show($id){
        $carMileage = CarMileageLog::findOrFail($id);

        return view('log.car-mileage.show', compact('carMileage'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $data = $request->only([
            'date', 'vehicle_id', 'driver_name',
            'start_location', 'end_location',
            'start_time', 'end_time',
            'start_mileage', 'end_mileage',
            'purpose', 'note'
        ]);

        $data['school_id'] = $user->school;

        CarMileageLog::create($data);

        return redirect()->route('car-mileage-logs.index');
    }

    function edit($id){
        $carMileage = CarMileageLog::findOrFail($id);

        return view('log.car-mileage.edit', compact('carMileage'));
    }

    function update(Request $request, $id){
        $carMileage = CarMileageLog::findOrFail($id);

        $data = $request->only([
            'date', 'vehicle_id', 'driver_name',
            'start_location', 'end_location',
            'start_time', 'end_time',
            'start_mileage', 'end_mileage',
            'purpose', 'note'
        ]);

        $carMileage->update($data);

        return redirect()->route('car-mileage-logs.index');

    }

    function destroy($id) {
        $carMileage = CarMileageLog::findOrFail($id);

        $carMileage->delete($id);

        return response()->json(['status' => 'success', 'message' => 'Deleted']);

    }

}
