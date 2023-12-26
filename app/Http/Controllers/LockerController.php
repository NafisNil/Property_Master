<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\Locker;
use App\Models\StorageLocker;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LockerController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {
            $lockers = Locker::with(['storage']);

            return DataTables::of($lockers)
                ->addColumn('action', function ($row) {
                    return view('locker.action-button', compact('row'));
                })
                ->editColumn('vacant', function ($row) {
                    if($row->vacant){
                        return "Yes";
                    }
                    return "No";
                })
                ->make(true);

        }

        return view("locker.index");
    }

    function create()
    {

        $storageHolderTypes = StaticData::getStorageHolderTypes();
        $storages = StorageLocker::getForDropdown();

        return view("locker.create", compact('storageHolderTypes', 'storages'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'locker_no' => 'required',
            'storage_id' => 'required',
            'storage_holder_type' => 'required',
            'dedicated_no' => 'required',
            'location' => 'required',
        ]);

        $data = $request->only([
            'locker_no', 'storage_id', 'storage_holder_type', 'dedicated_no',
            'location', 'vacant'
        ]);

        $data['school_id'] = $user->school_id;

        Locker::create($data);

        return redirect()->route("lockers.index");

    }

    function edit($id)
    {
        $locker = Locker::findOrFail($id);
        $storageHolderTypes = StaticData::getStorageHolderTypes();
        $storages = StorageLocker::getForDropdown();

        return view('locker.edit', compact('locker', 'storages', 'storageHolderTypes'));
    }

    function update(Request $request, $id)
    {
        $user = auth()->user();

        $request->validate([
            'locker_no' => 'required',
            'storage_id' => 'required',
            'storage_holder_type' => 'required',
            'dedicated_no' => 'required',
            'location' => 'required',
        ]);

        $data = $request->only([
            'locker_no', 'storage_id', 'storage_holder_type', 'dedicated_no',
            'location', 'vacant'
        ]);

        $locker = Locker::findOrFail($id);

        $locker->update($data);

        toastr()->success(__('updated'));

        return redirect()->route("lockers.index");
    }

    function destroy($id)
    {
        $locker = Locker::findOrFail($id);
        $locker->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
