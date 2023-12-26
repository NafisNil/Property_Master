<?php

namespace App\Http\Controllers;

use App\Models\ChartAccount;
use App\Models\ChartAccountCategory;
use App\Models\InventoryItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ChartAccountController extends BaseController
{
    function index()
    {
        $this->checkPermission('account.view');

        $user = auth()->user();

        if (request()->ajax()) {

            $items = ChartAccount::with(['createdBy', 'category', 'subCategory'])
                ->select('chart_accounts.*', DB::raw("(SELECT SUM(IF(account_type='credit', amount, -1*amount)) FROM transactions where chart_accounts.id = transactions.account_id) as balance"));

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/chart-accounts/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/chart-accounts/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('chart-account.index');

    }

    function create()
    {
        $this->checkPermission('account.create');

        $parentCategories = ChartAccountCategory::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('chart-account.create', compact('parentCategories'));
    }

    function store()
    {
        $this->checkPermission('account.create');

        \request()->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $user = auth()->user();

        DB::beginTransaction();

        try {

            $account = ChartAccount::create([
                'name' => \request()->input('name'),
                'account_no' => \request()->input('account_no', null),
                'category_id' => \request()->input('category_id'),
                'sub_category_id' => \request()->input('sub_category_id', null),
                'school_id' => $user->school_id,
                'created_by' => auth()->id(),
            ]);

            //now add opening balance

            Transaction::create([
                'school_id' => $user->school_id,
                'date' => \request()->input('date', now()),
                'account_id' => $account->id,
                'amount' => \request()->input('balance'),
                'type' => 'deposit',
                'sub_type' => 'opening_balance',
                'account_type' => 'credit',
                'created_by' => auth()->id(),
                'status' => 'completed'
            ]);

            DB::commit();

            return redirect()->route('chart-accounts.index');

        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function edit($id)
    {
        $this->checkPermission('account.edit');

        $item = ChartAccount::findOrFail($id);

        $parentCategories = ChartAccountCategory::whereNull('parent_id')
            ->pluck('name', 'id');

        $subCategories = ChartAccountCategory::where('parent_id', $item->category_id)
            ->pluck('name', 'id');

        return view('chart-account.edit', compact('item', 'subCategories', 'parentCategories'));
    }

    function update($id)
    {
        $this->checkPermission('account.edit');

        \request()->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);

        $user = auth()->user();

        $account = ChartAccount::find($id);

        try {

            $account->name = \request()->input('name');
            $account->account_no = \request()->input('account_no', null);
            $account->category_id = \request()->input('category_id');
            $account->sub_category_id = \request()->input('sub_category_id');

            $account->save();

            return redirect()->route('chart-accounts.index');

        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    function destroy($id)
    {

        $this->checkPermission('account.delete');

        $item = ChartAccount::findOrFail($id);

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
