<?php

namespace App\Http\Controllers;

use App\Models\AccountTransaction;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepositController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $query = AccountTransaction::with('bankAccount')
                ->where("school_id", $user->school_id)
                ->where('sub_type', 'deposit');

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view('book-keeping.deposit.action-button', compact('row'));
                })
                ->make(true);

        }

        return view('book-keeping.deposit.index');
    }

    function create()
    {

        $bankAccounts = BankAccount::getForDropdown();

        return view('book-keeping.deposit.create', compact('bankAccounts'));
    }

    function store(Request $request)
    {

        $request->validate([
            'amount' => 'required',
        ]);

        $user = auth()->user();

        $data = $request->only([
            "unique_no", "date", "transaction_no", 'amount',
            "bank_slip_no", "account_id", "description", 'is_reconciled'
        ]);

        $data['type'] = 'credit';
        $data['sub_type'] = 'deposit';
        $data['school_id'] = $user->school_id;

        AccountTransaction::create($data);

        return redirect()->route('deposits.index');

    }

    function edit($id)
    {
        $item = AccountTransaction::findOrFail($id);

        $bankAccounts = BankAccount::getForDropdown();

        return view('book-keeping.deposit.edit', compact('item', 'bankAccounts'));
    }

    function update(Request $request, $id)
    {

        $request->validate([
            'amount' => 'required',
        ]);

        $item = AccountTransaction::findOrFail($id);

        $user = auth()->user();

        $data = $request->only([
            "date", "transaction_no", 'amount',
            "bank_slip_no", "account_id", "description", 'reconciled'
        ]);

        $item->update($data);

        return redirect()->route('deposits.index');

    }

    function destroy($id)
    {
        $item = AccountTransaction::findOrFail($id);
        $item->delete();
        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
