<?php

namespace App\Http\Controllers;

use App\Models\FeeCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FeeCategoryController extends Controller
{
    function index()
    {
        if (\request()->ajax()) {

            $categories = FeeCategory::with('parent');

            return DataTables::of($categories)
                ->addColumn('action', function ($row) {
                    return view('fee-category.action-buttons', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('fee-category.index');
    }

    function create()
    {

        $parentCategories = FeeCategory::getForDropdown();

        return view('fee-category.create', compact('parentCategories'));
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);

        $data = $request->only(['name', 'status', 'parent_id']);

        FeeCategory::create($data);

        return redirect()->route('fee-categories.index');

    }

    function edit($id)
    {
        $feeCategory = FeeCategory::findOrFail($id);

        $parentCategories = FeeCategory::getForDropdown();

        return view('fee-category.edit', compact('feeCategory', 'parentCategories'));
    }

    function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'status' => 'required'
        ]);

        $data = $request->only(['name', 'status', 'parent_id']);

        $feeCategory = FeeCategory::findOrFail($id);

        $feeCategory->update($data);

        return redirect()->route('fee-categories.index');

    }

    function destroy($id)
    {
        $feeCategory = FeeCategory::findOrFail($id);

        $feeCategory->delete();

        return response()->json(['status' => 'success']);
    }
}
