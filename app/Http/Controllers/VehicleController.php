<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Car;
use App\Models\Contact;
use App\Models\Vehicle;
use App\Models\VehicleInsurance;
use App\Models\VehicleType;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class VehicleController extends Controller
{
    function index()
    {

        if (\request()->ajax()) {
            $vehicles = Vehicle::with('type');

            return DataTables::of($vehicles)
                ->addColumn('action', function ($row) {
                    return view("parking.vehicle.action-button", compact('row'));
                })
                ->make(true);
        }

        return view('parking.vehicle.index');
    }

    function create()
    {

        $types = VehicleType::getForDropdown();

        return view('parking.vehicle.create', compact('types'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'vehicle_no' => 'required',
            'plate_no' => 'required',
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
        ]);

        $contactData = $request->only([
            'office', 'mobile', 'email', 'emergency_phone'
        ]);

        $contactData['school_id'] = $user->school_id;

        DB::beginTransaction();

        try {

            $contact = Contact::create($contactData);

            $addressData = $request->only(['country', 'city', 'state', 'zip', 'street']);

            $addressData['name'] = $request->input('address');
            $addressData['school_id'] = $user->school_id;

            $address = Address::create($addressData);

            $document = (new FileService())->upload($request, $user, 'document', ['mode' => 'single']);

            $insurance = VehicleInsurance::create([
                'company_name' => $request->input('company_name'),
                'policy_no' => $request->input('policy_no'),
                'expire_date' => $request->input('expire_date'),
                'expired' => $request->input('expired'),
                'document' => !empty($document) ? $document->file_path : null,
                'address_id' => $address->id,
                'contact_id' => $contact->id,
                'school_id' => $user->school_id,
            ]);

            $vehicleData = $request->only(['vehicle_no', 'plate_no', 'make', 'model', 'color', 'year', 'vehicle_type_id']);

            $vehicleData['school_id'] = $user->school_id;
            $vehicleData['vehicle_insurance_id'] = $insurance->id;

            Vehicle::create($vehicleData);

            DB::commit();

            return redirect()->route("vehicles.index");

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    function edit($id)
    {

        $vehicle = Vehicle::with(['insurance.contact', 'insurance.address'])
            ->findOrFail($id);

        $types = VehicleType::getForDropdown();

        return view('parking.vehicle.edit', compact('vehicle', 'types'));

    }

    function update(Request $request, $id)
    {

        $user = auth()->user();

        $request->validate([
            'vehicle_no' => 'required',
            'plate_no' => 'required',
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
        ]);

        $contactData = $request->only([
            'office', 'mobile', 'email', 'emergency_phone'
        ]);

        $vehicle = Vehicle::findOrFail($id);

        $insurance = VehicleInsurance::findOrFail($vehicle->vehicle_insurance_id);

        DB::beginTransaction();

        try {

            $insurance->contact()->update($contactData);

            $addressData = $request->only(['country', 'city', 'state', 'zip', 'street']);

            $addressData['name'] = $request->input('address');

            $insurance->address()->update($addressData);

            $document = (new FileService())->upload($request, $user, 'document', ['mode' => 'single']);

            $insurance->update([
                'company_name' => $request->input('company_name'),
                'policy_no' => $request->input('policy_no'),
                'expire_date' => $request->input('expire_date'),
                'expired' => $request->input('expired'),
                'document' => !empty($document) ? $document->file_path : null,
            ]);

            $vehicleData = $request->only(['vehicle_no', 'plate_no', 'make', 'model', 'color', 'year', 'vehicle_type_id']);

            $vehicle->update($vehicleData);

            DB::commit();

            return redirect()->route("vehicles.index");

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }

    }

    function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
