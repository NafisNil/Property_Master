<?php

namespace App\Http\Controllers;

use App\Models\Parker;
use App\Models\ParkerType;
use App\Models\ParkingRate;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ParkingRateController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $query = ParkingRate::with('type')->where('school_id', $user->school_id);

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view('parking.rate.action-button', compact('row'));
                })->make(true);


        }

        return view('parking.rate.index');
    }

    function create()
    {

        $parkerTypes = ParkerType::getForDropdown();

        return view('parking.rate.create', compact('parkerTypes'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'parker_type_id' => 'required',
            'amount' => 'required|numeric',
            'tax' => 'required|numeric',
            'expire_rate' => 'required|numeric',
        ]);

        $data = $request->only(['parker_type_id', 'amount', 'tax', 'expire_rate']);

        $data['school_id'] = $user->school_id;
        $data['amount_after_tax'] = $request->input('amount') + $request->input('tax');

        ParkingRate::create($data);

        return redirect()->route('parking-rates.index');

    }

    function edit($id)
    {
        $parkingRate = ParkingRate::findOrFail($id);

        $parkerTypes = ParkerType::getForDropdown();

        return view('parking.rate.edit', compact('parkingRate', 'parkerTypes'));
    }

    function update(Request $request, $id)
    {
        $user = auth()->user();

        $request->validate([
            'parker_type_id' => 'required',
            'amount' => 'required|numeric',
            'tax' => 'required|numeric',
            'expire_rate' => 'required|numeric',
        ]);

        $data = $request->only(['parker_type_id', 'amount', 'tax', 'expire_rate']);

        $data['amount_after_tax'] = $request->input('amount') + $request->input('tax');

        $parkingRate = ParkingRate::findOrFail($id);

        $parkingRate->update($data);

        return redirect()->route('parking-rates.index');
    }

    function destroy($id)
    {
        $parkingRate = ParkingRate::findOrFail($id);
        $parkingRate->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
