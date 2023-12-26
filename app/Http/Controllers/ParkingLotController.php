<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use App\Models\ParkingLot;
use App\Models\StorageLocker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ParkingLotController extends Controller
{
    function index(Request $request)
    {

        if ($request->ajax()) {

            $parkingLot = ParkingLot::query();

            return DataTables::of($parkingLot)
                ->addColumn('action', function ($row) {
                    return view("parking.lot.action-button", compact('row'));
                })
                ->make(true);
        }

        return view('parking.lot.index');
    }

    function create()
    {
        return view('parking.lot.create');
    }

    function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'lot_no' => 'required|string',
            'lot_name' => 'required|string'
        ]);

        $addressData = $request->only([
            "country", "state", "city", "street", "zip"
        ]);

        $addressData['name'] = $request->input('address', null);
        $addressData['school_id'] = $user->school_id;

        $contactData = [
            'name' => $request->input('contact_name', null),
            'office' => $request->input('contact_office', null),
            'phone' => $request->input('contact_phone', null),
            'mobile' => $request->input('contact_mobile', null),
            'fax' => $request->input('contact_fax', null),
            'website' => $request->input('contact_website', null),
            'email' => $request->input('contact_email', null),
            'school_id' => $user->school_id,
        ];

        DB::beginTransaction();

        try {

            $address = Address::create($addressData);
            $contact = Contact::create($contactData);

            ParkingLot::create([
                'lot_no' => $request->input('lot_no'),
                'lot_name' => $request->input('lot_name'),
                'total_stalls' => $request->input('total_stalls'),
                'contact_id' => $contact->id,
                'address_id' => $address->id,
                'school_id' => $user->school_id,
            ]);

            DB::commit();

            toastr()->success('Added');

            return redirect()->route('parking-lots.index');

        } catch (\Exception $exception) {
            DB::rollback();

            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function edit($id)
    {
        $parkingLot = ParkingLot::with(['contact', 'address'])->findOrFail($id);

        return view('parking.lot.edit', compact('parkingLot'));
    }

    function update(Request $request, $id)
    {

        $user = auth()->user();

        $request->validate([
            'lot_no' => 'required|string',
            'lot_name' => 'required|string'
        ]);

        $addressData = $request->only([
            "country", "state", "city", "street", "zip"
        ]);

        $addressData['name'] = $request->input('address', null);

        $contactData = [
            'name' => $request->input('contact_name', null),
            'office' => $request->input('contact_office', null),
            'phone' => $request->input('contact_phone', null),
            'mobile' => $request->input('contact_mobile', null),
            'fax' => $request->input('contact_fax', null),
            'website' => $request->input('contact_website', null),
            'email' => $request->input('contact_email', null),
        ];

        $parkingLot = ParkingLot::findOrFail($id);

        DB::beginTransaction();

        try {

            $parkingLot->address->update($addressData);
            $parkingLot->contact->update($contactData);

            $parkingLot->update([
                'lot_no' => $request->input('lot_no'),
                'lot_name' => $request->input('lot_name'),
                'total_stalls' => $request->input('total_stalls'),
            ]);

            DB::commit();

            toastr()->success(__('updated'));

            return redirect()->route('parking-lots.index');

        } catch (\Exception $exception) {
            DB::rollback();

            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function destroy($id){
        $parkingLot = ParkingLot::findOrFail($id);
        $parkingLot->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }


}
