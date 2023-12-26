<?php

namespace App\Http\Controllers;

use App\Models\ParkerType;
use App\Models\ParkingLot;
use App\Models\ParkingStall;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ParkingStallController extends Controller
{
    function index(Request $request)
    {
        if ($request->ajax()) {
            $stalls = ParkingStall::with(['lot', 'parkerType']);

            return DataTables::of($stalls)
                ->addColumn('action', function ($row) {
                    return view('parking.stall.action-button', compact('row'));
                })
                ->make(true);

        }

        return view('parking.stall.index');
    }

    function create()
    {

        $parkingLots = ParkingLot::getForDropdown();
        $parkerTypes = ParkerType::getForDropdown();

        return view('parking.stall.create', compact('parkingLots', 'parkerTypes'));
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parker_type_id' => 'required',
            'lot_id' => 'required',
        ]);

        $data = $request->only([
            'name', 'parker_type_id', 'lot_id', 'dedicated_no',
            'location', 'size'
        ]);

        $data['school_id'] = auth()->user()->school_id;

        ParkingStall::create($data);

        return redirect()->route('parking-stalls.index');

    }

    function edit($id)
    {
        $parkingStall = ParkingStall::findOrFail($id);

        $parkingLots = ParkingLot::getForDropdown();
        $parkerTypes = ParkerType::getForDropdown();

        return view('parking.stall.edit', compact('parkingStall', 'parkingLots', 'parkerTypes'));
    }

    function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'parker_type_id' => 'required',
            'lot_id' => 'required',
        ]);

        $data = $request->only([
            'name', 'parker_type_id', 'lot_id', 'dedicated_no',
            'location', 'size'
        ]);

        $parkingStall = ParkingStall::findOrFail($id);

        $parkingStall->update($data);

        return redirect()->route('parking-stalls.index');

    }

    function getUnoccupiedStalls()
    {

        $user = auth()->user();

        $stalls = ParkingStall::where('vacant', 1)
            ->where('school_id', $user->school_id)
            ->get();

        return response()->json($stalls);

    }

}
