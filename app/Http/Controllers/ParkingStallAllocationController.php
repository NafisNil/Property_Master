<?php

namespace App\Http\Controllers;

use App\Models\ParkerType;
use App\Models\ParkingStall;
use App\Models\ParkingStallAllocation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ParkingStallAllocationController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {
            $query = ParkingStallAllocation::with(['stall', 'parker', 'parkerType', 'vehicle']);

            return DataTables::of($query)
                ->make(true);
        }

        return view('parking.stall-allocation.index');
    }

    function create()
    {

        $parkerTypes = ParkerType::getForDropdown();
        $vehicles = Vehicle::getForDropdown();

        return view('parking.stall-allocation.create', compact('parkerTypes', 'vehicles'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $data = $request->only([
            'stall_id', 'parker_id', 'parker_type_id', 'vehicle_id',
        ]);

        $data['school_id'] = $user->school_id;

        ParkingStallAllocation::create($data);

        $parkingStall = ParkingStall::findOrFail($request->input('stall_id'));
        $parkingStall->vacant = false;
        $parkingStall->save();

        return redirect()->route('parking-stall-allocation.index');

    }

}
