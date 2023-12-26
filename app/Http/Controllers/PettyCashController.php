<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PettyCashController extends Controller
{

    private $paymentMethods = [
        "Online Banking" => "Online Banking",
        "Email Transfer" => "Email Transfer",
        "Cash" => "Cash",
        "Credit Card" => "Credit Card",
        "Check" => "Check",
        "Money Order" => "Money Order",
    ];

    private $paymentStatues = [
        'Paid' => "Paid",
        'Partial' => "Partial",
        'Pending' => "Pending",
        'Processing' => 'Processing',
        'Payment on way' => "Payment on way",
        'Overdue' => "Overdue",
        'Void' => "Void",
        'Refunded' => "Refunded",
        'Hold' => "Hold",
        'Disputed' => "Disputed",
    ];

    function getInitialPayment()
    {
        $accountHolders = User::getForDropdown();

        return view('book-keeping.petty-cash.initial-payment.create', compact('accountHolders'))
            ->with(['paymentMethods' => $this->paymentMethods, 'statuses' => $this->paymentStatues]);
    }

    function storeInitialPayment(Request $request)
    {

        $user = auth()->user();

        $validatedData = $request->validate([
            'unique_no' => 'required|string',
            'payment_no' => 'required|string',
            'date' => 'required|date',
            'account_holder_id' => 'required|string',
            'amount' => 'required|numeric',
            'method' => 'required|string',
            'status' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $validatedData['type'] = 'petty-cash-initial-payment';
        $validatedData['school_id'] = $user->school_id;
        $validatedData['created_by'] = $user->id;

        Payment::create($validatedData);

        toastr()->success(__('added'));

        return redirect()->back();

    }

    function getReimbursementPayment()
    {
        $accountHolders = User::getForDropdown();

        return view('book-keeping.petty-cash.reimbursement-payment.create', compact('accountHolders'))
            ->with(['paymentMethods' => $this->paymentMethods, 'statuses' => $this->paymentStatues]);
    }

    function storeReimbursementPayment(Request $request)
    {

        $user = auth()->user();

        $validatedData = $request->validate([
            'unique_no' => 'required|string',
            'payment_no' => 'required|string',
            'date' => 'required|date',
            'account_holder_id' => 'required|string',
            'amount' => 'required|numeric',
            //'method' => 'required|string',
            'status' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $validatedData['type'] = 'reimbursement';
        $validatedData['school_id'] = $user->school_id;
        $validatedData['created_by'] = $user->id;

        Payment::create($validatedData);

        toastr()->success(__('added'));

        return redirect()->back();

    }

}
