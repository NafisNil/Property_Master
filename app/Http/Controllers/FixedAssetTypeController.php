<?php

namespace App\Http\Controllers;

use App\Models\ChartAccountCategory;
use App\Models\FixedAssetType;
use App\Models\InventoryItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FixedAssetTypeController extends Controller
{
    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $items = FixedAssetType::leftJoin('fixed_asset_types as FAT', 'fixed_asset_types.parent_id', '=', 'FAT.id')
                ->select('fixed_asset_types.id', 'fixed_asset_types.name', 'FAT.name as parentName');

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/fixed-asset-types/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/fixed-asset-types/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('fixed-asset-type.index');

    }

    function create()
    {
        $parentTypes = FixedAssetType::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('fixed-asset-type.create', compact('parentTypes'));
    }

    function store()
    {
        \request()->validate([
            'name' => 'required',
            'parent_id' => 'nullable|numeric',
        ]);

        $user = auth()->user();

        FixedAssetType::create([
            'school_id' => $user->school_id,
            'name' => \request()->input('name'),
            'parent_id' => \request()->input('parent_id')
        ]);

        return redirect()->route('fixed-asset-types.index');

    }

    function edit($id)
    {
        $item = FixedAssetType::findOrFail($id);

        $parentTypes = FixedAssetType::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('fixed-asset-type.edit', compact('item', 'parentTypes'));
    }

    function update($id)
    {

        \request()->validate([
            'name' => 'required',
            'parent_id' => 'nullable|numeric',
        ]);

        $user = auth()->user();

        $fixedAssetType = FixedAssetType::findOrFail($id);


        $fixedAssetType->name = \request()->input('name');
        $fixedAssetType->parent_id = \request()->input('parent_id');

        $fixedAssetType->save();

        return redirect()->route('fixed-asset-types.index');

    }

    function destroy($id)
    {

        $item = FixedAssetType::findOrFail($id);

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function getChildCategories()
    {
        $id = \request()->input('id');

        $categories = ChartAccountCategory::where('parent_id', $id)
            ->select('id', 'name')->get();

        return response()->json($categories);

    }

    function getChildAssetTypes()
    {
        $id = \request()->input('id');

        $types = FixedAssetType::where('parent_id', $id)
            ->select('id', 'name')->get();

        return response()->json($types);
    }

}
