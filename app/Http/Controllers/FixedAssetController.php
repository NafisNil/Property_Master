<?php

namespace App\Http\Controllers;

use App\Models\ChartAccountCategory;
use App\Models\FixedAsset;
use App\Models\FixedAssetType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FixedAssetController extends Controller
{
    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $items = FixedAsset::with("type", 'subType');

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/fixed-assets/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/fixed-assets/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->editColumn('asset_type', function ($row) {
                    if (empty($row->type)) {
                        return '';
                    } else {
                        return $row->type->name;
                    }
                })
                ->editColumn('asset_sub_type', function ($row) {
                    if (empty($row->subType)) {
                        return '';
                    } else {
                        return $row->subType->name;
                    }
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('fixed-asset.index');

    }

    function create()
    {
        $parentTypes = FixedAssetType::whereNull('parent_id')
            ->pluck('name', 'id');

        $assetConditions = [
            "In Stock" => "In Stock",
            "In Use" => "In Use",
            "On Hold" => 'On Hold',
            "Under Repair" => 'Under Repair',
            "Sold" => "Sold",
            "Write Off" => "Write Off",
        ];

        return view('fixed-asset.create', compact('parentTypes', 'assetConditions'));
    }

    function store()
    {

        \request()->validate([
            'asset_name' => 'required',
            'serial_number' => 'string'
        ]);

        $user = auth()->user();

        FixedAsset::create([
            'school_id' => $user->school_id,
            'asset_name' => \request()->input('asset_name'),
            'serial_number' => \request()->input('serial_number'),
            'model' => \request()->input('model', null),
            'size' => \request()->input('size', null),
            'asset_type_id' => \request()->input('asset_type_id'),
            'asset_sub_type_id' => \request()->input('asset_sub_type_id'),
            'asset_condition' => \request()->input('asset_condition', null),
            'length' => \request()->input('length', null),
            'width' => \request()->input('width', null),
            'weight' => \request()->input('weight', null),
        ]);

        toastr()->success('added');

        return redirect()->route('fixed-assets.index');

    }

    function edit($id)
    {
        $item = FixedAsset::findOrFail($id);


        $parentTypes = FixedAssetType::whereNull('parent_id')
            ->pluck('name', 'id');

        $childTypes = FixedAssetType::where('parent_id', $item->asset_type_id)
            ->pluck('name', 'id');

        $assetConditions = [
            "In Stock" => "In Stock",
            "In Use" => "In Use",
            "On Hold" => 'On Hold',
            "Under Repair" => 'Under Repair',
            "Sold" => "Sold",
            "Write Off" => "Write Off",
        ];

        return view('fixed-asset.edit', compact('item', 'parentTypes', 'assetConditions', 'childTypes'));
    }

    function update($id)
    {

        \request()->validate([
            'asset_name' => 'required',
            'serial_number' => 'string'
        ]);

        $user = auth()->user();

        $fixedAsset = FixedAsset::findOrFail($id);

        try {
            $fixedAsset->asset_name = \request()->input('asset_name');
            $fixedAsset->serial_number = \request()->input('serial_number');
            $fixedAsset->model = \request()->input('model', null);
            $fixedAsset->size = \request()->input('size', null);
            $fixedAsset->asset_type_id = \request()->input('asset_type_id');
            $fixedAsset->asset_sub_type_id = \request()->input('asset_sub_type_id');
            $fixedAsset->asset_condition = \request()->input('asset_condition', null);
            $fixedAsset->length = \request()->input('length', null);
            $fixedAsset->width = \request()->input('width', null);
            $fixedAsset->weight = \request()->input('weight', null);

            $fixedAsset->save();

            toastr()->success('Updated');


            return redirect()->route('fixed-assets.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function destroy($id)
    {

        $item = FixedAsset::findOrFail($id);

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

}
