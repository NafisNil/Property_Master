<?php

namespace App\Http\Controllers;

use App\Models\ParkerType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ParkerTypeController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {

            $parkerTypes = ParkerType::query();

            return DataTables::of($parkerTypes)
                ->addColumn('action', function ($row) {
                    return view("parking.parker-type.action-button", compact('row'));
                })
                ->editColumn('status', function ($row) {
                    if($row->status){
                        return "<span class='badge badge-primary'>Active</span>";
                    }
                    return "<span class='badge badge-warning'>In-Active</span>";
                })
                ->rawColumns(['action', 'status'])
                ->make(true);

        }

        return view("parking.parker-type.index");
    }

    function create()
    {
        return view('parking.parker-type.create');
    }

    function store()
    {

        $user = auth()->user();

        \request()->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);

        ParkerType::create([
            'name' => \request()->input('name'),
            'status' => \request()->input('status'),
            'school_id' => $user->school_id
        ]);

        return redirect()->route('parker-types.index');

    }

    function edit($id)
    {
        $parkerType = ParkerType::findOrFail($id);

        return view('parking.parker-type.edit', compact('parkerType'));
    }

    function update($id)
    {
        \request()->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);

        $parkerType = ParkerType::findOrFail($id);

        $parkerType->update([
            'name' => \request()->input('name'),
            'status' => \request()->input('status'),
        ]);

        return redirect()->route('parker-types.index');
    }

    function destroy($id)
    {
        $parkerType = ParkerType::findOrFail($id);
        $parkerType->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
