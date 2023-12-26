<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\ChartAccount;
use App\Models\ChartAccountCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BankAccountController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (request()->ajax()) {

            $items = BankAccount::with(['createdBy'])
                ->select('bank_accounts.*', DB::raw("(SELECT SUM(IF(account_type='credit', amount, -1*amount)) FROM transactions where bank_accounts.id = transactions.bank_account_id) as balance"));

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/bank-accounts/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/bank-accounts/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('bank-account.index');

    }

    function create()
    {

        return view('bank-account.create');
    }

    function store()
    {
        \request()->validate([
            'name' => 'required',
        ]);

        $user = auth()->user();

        DB::beginTransaction();

        try {

            $account = BankAccount::create([
                'name' => \request()->input('name'),
                'account_no' => \request()->input('account_no', null),
                'school_id' => $user->school_id,
                'created_by' => auth()->id(),
            ]);

            //now add opening balance

            Transaction::create([
                'school_id' => $user->school_id,
                'date' => \request()->input('date', now()),
                'bank_account_id' => $account->id,
                'amount' => \request()->input('balance'),
                'type' => 'deposit',
                'sub_type' => 'opening_balance',
                'account_type' => 'credit',
                'created_by' => auth()->id(),
                'status' => 'completed'
            ]);

            DB::commit();

            return redirect()->route('bank-accounts.index');

        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function edit($id)
    {
        $item = BankAccount::findOrFail($id);

        return view('bank-account.edit', compact('item', ));
    }

    function update($id)
    {
        \request()->validate([
            'name' => 'required',
            'account_no' => 'required',
        ]);

        $user = auth()->user();

        $account = BankAccount::find($id);

        try {

            $account->name = \request()->input('name');
            $account->account_no = \request()->input('account_no');

            $account->save();

            return redirect()->route('bank-accounts.index');

        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    function destroy($id)
    {

        $item = BankAccount::findOrFail($id);

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }
}
