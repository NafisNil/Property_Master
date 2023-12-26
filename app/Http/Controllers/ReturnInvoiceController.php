<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Utils\TransactionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnInvoiceController extends Controller
{

    private $transactionUtil;

    function __construct(TransactionUtil $transactionUtil)
    {
        $this->transactionUtil = $transactionUtil;
    }

    function index($type)
    {

        $transactions = Transaction::where('type', '=', $type)
            ->get();

        return view('book-keeping.return.index', compact('transactions'));
    }

    function create($type, $id)
    {

        $user = auth()->user();

        $transaction = Transaction::with('items.itemDetail')
            ->findOrFail($id);

        return view("book-keeping.return.create", compact('transaction', 'type'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $type = $request->input('type');

        $invoiceNo = \request()->input('invoice_no');

        $purchaseTransaction = Transaction::where('invoice_no', $invoiceNo)
            ->first();

        $invoiceNo = (new TransactionUtil())->generateInvoiceNumber('return', $user->school_id, 'PR');

        DB::beginTransaction();

        try {

            $transaction = Transaction::create([
                'school_id' => $user->school_id,
                'date' => now(),
                'amount' => \request()->input('total'),
                'type' => $type,
                'description' => \request()->input('description'),
                'account_type' => 'debit',
                'status' => 'pending',
                'invoice_no' => $invoiceNo,
                'return_transaction_id' => $purchaseTransaction->id,
            ]);


            //check for mode

            foreach (\request()->input('items') as $item) {
                if ($item['quantity'] > 0) {
                    TransactionItem::create([
                        'transaction_id' => $transaction->id,
                        'cost' => $item['cost'],
                        'amount' => $item['amount'],
                        'item_id' => $item['item_id'],
                        'quantity' => $item['quantity']
                    ]);
                }
            }

            DB::commit();

            toastr()->success('Return Invoice Added');

            return redirect()->route('return-invoice.index', $type);
        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function show($id)
    {

        $transaction = Transaction::with('items.itemDetail')
            ->findOrFail($id);

        dd($transaction->toArray());

        return view("book-keeping.return.show", compact('transaction'));
    }


}
