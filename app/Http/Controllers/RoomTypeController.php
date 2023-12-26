<?php

namespace App\Http\Controllers;

use App\Models\ChartAccountCategory;
use App\Models\FixedAssetType;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoomTypeController extends Controller
{
    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $items = RoomType::leftJoin('room_types as RT', 'room_types.parent_id', '=', 'RT.id')
                ->select('room_types.id', 'room_types.name', 'RT.name as parentName');

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/room-types/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/room-types/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('room-type.index');

    }

    function create()
    {
        $parentTypes = RoomType::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('room-type.create', compact('parentTypes'));
    }

    function store()
    {
        \request()->validate([
            'name' => 'required',
            'parent_id' => 'nullable|numeric',
        ]);

        $user = auth()->user();

        RoomType::create([
            'school_id' => $user->school->id,
            'name' => \request()->input('name'),
            'parent_id' => \request()->input('parent_id')
        ]);

        return redirect()->route('room-types.index');

    }

    function edit($id)
    {
        $item = RoomType::findOrFail($id);

        $parentTypes = RoomType::whereNull('parent_id')
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

        $fixedAssetType = RoomType::findOrFail($id);


        $fixedAssetType->name = \request()->input('name');
        $fixedAssetType->parent_id = \request()->input('parent_id');

        $fixedAssetType->save();

        return redirect()->route('fixed-asset-types.index');

    }

    function destroy($id)
    {

        $item = RoomType::findOrFail($id);

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

    function getChildRoomTypes()
    {
        $id = \request()->input('id');

        $types = RoomType::where('parent_id', $id)
            ->select('id', 'name')->get();

        return response()->json($types);
    }
}
