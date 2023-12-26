<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use App\Models\Parker;
use App\Models\ParkerType;
use App\Models\StorageLocker;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ParkerController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {

            $parkers = Parker::query();

            return DataTables::of($parkers)
                ->addColumn('action', function ($row) {
                    return view('parking.parker.action-button', compact('row'));
                })
                ->editColumn('image', function ($row) {
                    return "<img src='/storage/$row->image' style='width: 50px; height: 50px' >";
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('parking.parker.index');
    }

    function create()
    {
        $parkerTypes = ParkerType::getForDropdown();

        return view("parking.parker.create", compact('parkerTypes'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'name' => 'required|string',
            'image' => 'required|file',
            'license_no' => 'required|string',
            'expiry_date' => 'required',
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

            $data = $request->only([
                'name', 'parker_type_id', 'license_no', 'expiry_date'
            ]);

            $image = (new FileService())->upload($request, $user, 'image', ['mode' => 'single']);

            $document = (new FileService())->upload($request, $user, 'document', ['mode' => 'single']);

            $data['image'] = !empty($image) ? $image->file_path : null;
            $data['document'] = !empty($document) ? $document->file_path : null;
            $data['school_id'] = $user->school_id;
            $data['contact_id'] = $contact->id;
            $data['address_id'] = $address->id;

            Parker::create($data);

            DB::commit();

            toastr()->success('Added');

            return redirect()->route('parkers.index');

        } catch (\Exception $exception) {
            DB::rollback();

            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function edit($id)
    {

        $parker = Parker::with(['address', 'contact'])->findOrFail($id);

        $parkerTypes = ParkerType::getForDropdown();

        return view('parking.parker.edit', compact('parker', 'parkerTypes'));
    }

    function update(Request $request, $id)
    {

        $user = auth()->user();

        $parker = Parker::with(['address', 'contact'])
            ->findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'license_no' => 'required|string',
            'expiry_date' => 'required',
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

            $parker->address->update($addressData);
            $parker->contact->update($contactData);

            $data = $request->only([
                'name', 'parker_type_id', 'license_no', 'expiry_date'
            ]);

            $image = (new FileService())->upload($request, $user, 'image', ['mode' => 'single']);

            $document = (new FileService())->upload($request, $user, 'document', ['mode' => 'single']);

            if (!empty($image)) {
                $data['image'] = $image->file_path;
            }
            $data['document'] = !empty($document) ? $document->file_path : null;

            $parker->update($data);

            DB::commit();

            toastr()->success('Added');

            return redirect()->route('parkers.index');

        } catch (\Exception $exception) {
            DB::rollback();

            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function destroy($id)
    {
        $parker = Parker::findOrFail($id);
        $parker->delete();
        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

    function getParkers()
    {

        $id = \request()->input('id');

        $parkers = Parker::where('parker_type_id', $id)
            ->get();

        return response()->json($parkers);
    }

}
