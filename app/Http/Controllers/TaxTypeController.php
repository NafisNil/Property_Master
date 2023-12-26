<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Models\TaxType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaxTypeController extends Controller
{
    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $items = TaxType::all();

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/tax-types/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/tax-types/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('tax.type.index');

    }

    function create()
    {
        return view('tax.type.create');
    }

    function store()
    {
        \request()->validate([
            'name' => 'required',
        ]);

        $user = auth()->user();

        TaxType::create([
            'school_id' => $user->school,
            'name' => \request()->input('name'),
        ]);

        return redirect()->route('tax-types.index');

    }

    function edit($id)
    {
        $item = TaxType::findOrFail($id);

        return view('tax.type.edit', compact('item'));
    }

    function update($id)
    {

        \request()->validate([
            'name' => 'required',
        ]);

        $item = TaxType::findOrFail($id);

        $item->name = \request()->input('name');
        $item->save();

        toastr()->success('Updated');

        return redirect()->route('tax-types.index');

    }

    function destroy($id)
    {

        $item = TaxType::findOrFail($id);


        //find if account exists for this account categories

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
