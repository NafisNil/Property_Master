<?php

namespace App\Http\Controllers;

use App\Models\ChartAccount;
use App\Models\ChartAccountCategory;
use App\Models\FixedAssetType;
use App\Models\InventoryItem;
use App\Models\ItemType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceTypeController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (request()->ajax()) {

            $items = ItemType::all();

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/service-types/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/service-types/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('service-type.index');

    }

    function create()
    {
        return view('service-type.create');
    }

    function store()
    {
        \request()->validate([
            'name' => 'required',
        ]);

        $user = auth()->user();

        ItemType::create([
            'school_id' => $user->school,
            'name' => \request()->input('name'),
            'type' => \request()->input('type'),
        ]);

        return redirect()->route('service-types.index');

    }

    function edit($id)
    {
        $item = ItemType::findOrFail($id);

        return view('service-type.edit', compact('item'));
    }

    function update($id)
    {

        \request()->validate([
            'name' => 'required',
        ]);

        $item = ItemType::findOrFail($id);

        $item->name = \request()->input('name');
        $item->save();

        return redirect()->route('service-types.index');

    }

    function destroy($id)
    {

        $item = ItemType::findOrFail($id);


        //find if account exists for this account categories

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
