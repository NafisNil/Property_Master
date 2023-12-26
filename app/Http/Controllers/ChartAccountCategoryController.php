<?php

namespace App\Http\Controllers;

use App\Models\ChartAccount;
use App\Models\ChartAccountCategory;
use App\Models\InventoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ChartAccountCategoryController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (request()->ajax()) {

            $items = ChartAccountCategory::leftJoin('chart_account_categories as cac', 'chart_account_categories.parent_id', '=', 'cac.id')
                ->select('chart_account_categories.id', 'chart_account_categories.name', 'cac.name as parentName');


            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/chart-account-categories/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/chart-account-categories/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('chart-account-category.index');

    }

    function create()
    {
        $parentCategories = ChartAccountCategory::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('chart-account-category.create', compact('parentCategories'));
    }

    function store()
    {
        \request()->validate([
            'name' => 'required',
            'parent_id' => 'nullable|numeric',
        ]);

        $user = auth()->user();

        ChartAccountCategory::create([
            'school_id' => $user->school_id,
            'name' => \request()->input('name'),
            'parent_id' => \request()->input('parent_id')
        ]);

        return redirect()->route('chart-account-categories.index');

    }

    function edit($id)
    {
        $item = ChartAccountCategory::findOrFail($id);

        $parentCategories = ChartAccountCategory::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('chart-account-category.edit', compact('item', 'parentCategories'));
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

        $item = ChartAccountCategory::findOrFail($id);


        //find if account exists for this account categories

        $accounts = ChartAccount::where('category_id', $item->category_id)
            ->orWhere('sub_category_id', $item->sub_category_id)
            ->get();

        if(count($accounts)>0){
            return response()->json(['status' => 'failed', 'message' => 'Unable to Delete. This categories has active accounts']);
        }

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
