<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\JobOrder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Yajra\DataTables\Facades\DataTables;

class InventoryItemController extends Controller
{
    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $items = InventoryItem::select('id', 'code', 'name', 'stock_qty');

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/inventory-items/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/inventory-items/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('inventory-item.index');

    }

    function create()
    {
        return view('inventory-item.create');
    }

    function store()
    {
        \request()->validate([
            'code' => 'required',
            'name' => 'required',
            'current_stock' => 'required'
        ]);

        $user = auth()->user();

        InventoryItem::create([
            'school_id' => $user->id,
            'code' => \request()->input('code'),
            'name' => \request()->input('name'),
            'stock_qty' => \request()->input('current_stock')
        ]);

        return redirect()->route('inventory-items.index');

    }

    function edit($id)
    {
        $item = InventoryItem::findOrFail($id);
        return view('inventory-item.edit', compact('item'));
    }

    function update($id)
    {

        \request()->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $item = InventoryItem::findOrFail($id);

        $item->name = \request()->input('name');
        $item->code = \request()->input('code');
        $item->save();

        return redirect()->route('inventory-items.index');

    }

    function destroy($id)
    {

        $item = InventoryItem::findOrFail($id);

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function getItems() {
        $items = InventoryItem::all();
        return response()->json(['status' =>'success', 'data' => $items]);
    }

}
