<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\DailyReportController;
use App\Models\Address;
use App\Models\Contact;
use App\Models\StorageLocker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class StorageLockerController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {

            $storageLockers = StorageLocker::query();

            return DataTables::of($storageLockers)
                ->addColumn('action', function ($row) {
                    return view('storage-locker.action-button', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('storage-locker.index');
    }

    function create()
    {
        return view("storage-locker.create");
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'storage_no' => 'required|string',
            'storage_name' => 'required|string'
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

            StorageLocker::create([
                'storage_no' => $request->input('storage_no'),
                'storage_name' => $request->input('storage_name'),
                'total_lockers' => $request->input('total_lockers'),
                'contact_id' => $contact->id,
                'address_id' => $address->id,
                'school_id' => $user->school_id,
            ]);

            DB::commit();

            toastr()->success('Added');

            return redirect()->route('storage-lockers.index');

        } catch (\Exception $exception) {
            DB::rollback();

            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function edit($id)
    {
        $storageLocker = StorageLocker::with(['address', 'contact'])->findOrFail($id);

        return view('storage-locker.edit', compact('storageLocker'));
    }

    function update(Request $request, $id)
    {

        $storageLocker = StorageLocker::with(['address', 'contact'])
            ->findOrFail($id);

        $user = auth()->user();

        $request->validate([
            'storage_no' => 'required|string',
            'storage_name' => 'required|string'
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

        DB::beginTransaction();

        try {

            $storageLocker->update([
                'storage_no' => $request->input('storage_no'),
                'storage_name' => $request->input('storage_name'),
                'total_lockers' => $request->input('total_lockers'),
            ]);

            $storageLocker->address->update($addressData);
            $storageLocker->contact->update($contactData);

            DB::commit();

            toastr()->success('Updated');

            return redirect()->route('storage-lockers.index');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }

    }

    function destroy($id){
        $storageLocker = StorageLocker::findOrFail($id);
        $storageLocker->delete();
        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }


}
