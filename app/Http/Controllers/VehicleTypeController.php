<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VehicleTypeController extends Controller
{
    function index(Request $request)
    {
        if ($request->ajax()) {
            $query = VehicleType::query();

            return DataTables::of($query)
                ->addColumn('actions', function ($row) {
                    return view('parking.vehicle.type.action-button', compact('row'));
                })
                ->make(true);
        }

        return view('parking.vehicle.type.index');
    }

    function create()
    {
        return view('parking.vehicle.type.create');
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'name' => 'required',
        ]);

        VehicleType::create([
            'name' => $request->input('name'),
            'school_id' => $user->school_id
        ]);

        toastr()->success(__('added'));

        return redirect()->route('vehicle-types.index');

    }

    function edit($id)
    {
        $vehicleType = VehicleType::findOrFail($id);

        return view('parking.vehicle.type.edit', compact('vehicleType'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $vehicleType = VehicleType::findOrFail($id);

        $vehicleType->name = $request->input('name');

        $vehicleType->save();

        toastr()->success(__('updated'));

        return redirect()->route('vehicle-types.index');

    }

    function destroy($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }
}
