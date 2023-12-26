<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{

    private $paymentMethods = [
        "Online Banking" => "Online Banking",
        "Email Transfer" => "Email Transfer",
        "Cash" => "Cash",
        "Credit Card" => "Credit Card",
        "Check" => "Check",
        "Money Order" => "Money Order",
    ];

    function createIndirectReceipt()
    {

        $accountHolders = User::getForDropdown();
        $accounts = BankAccount::getForDropdown();

        return view('book-keeping.receipt.indirect.create', compact('accountHolders', 'accounts'))
            ->with(['paymentMethods' => $this->paymentMethods]);
    }

    function postIndirectReceipt(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'unique_no' => 'required|string',
            'payment_no' => 'required|string',
            'date' => 'required|date',
            'account_holder_id' => 'required|string',
            'amount' => 'required|numeric',
            'method' => 'required|string',
            'note' => 'nullable|string',
            'account_id' => 'required|numeric'
        ]);

        $validatedData['type'] = 'receipt';
        $validatedData['school_id'] = $user->school_id;
        $validatedData['created_by'] = $user->id;

        Payment::create($validatedData);

        toastr()->success(__('added'));

        return redirect()->back();
    }

}
