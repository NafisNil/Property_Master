<?php

namespace App\Http\Controllers;

use App\Models\AccountTransaction;
use App\Models\BankAccount;
use App\Models\Department;
use App\Models\InvoiceController;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Utils\TransactionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    private $paymentMethods = [
        'cash' => 'Cash',
        'cheque' => 'Cheque',
    ];

    function index()
    {
        $payments = Payment::with('account')
            ->get();

        return view("payment.index", compact('payments'));
    }

    function create()
    {

        $user = auth()->user();

        $invoices = Transaction::where('school_id', $user->school)
            ->where(function ($query) {
                $query->where('payment_status', '!=', 'paid')
                    ->orWhereNull('payment_status');
            })
            ->whereIn('type', ['purchase', 'sale'])
            ->pluck('invoice_no', 'id');

        $bankAccounts = BankAccount::pluck('name', 'id');

        //dd($invoices);

        return view('payment.create', compact('invoices', 'bankAccounts'))
            ->with(['paymentMethods' => $this->paymentMethods]);
    }

    function store()
    {


        $user = auth()->user();

        \request()->validate([
            'date' => 'required',
        ]);

        //dd(\request()->all());

        DB::beginTransaction();

        try {


            foreach (\request()->input('items') as $item) {

                $code = (new TransactionUtil())->generateInvoiceNumber('payment', $user->school_id, 'PAY');

                $transaction = Transaction::find($item['id']);
                $transaction->payment_status = 'paid';
                $transaction->save();

                //add to payment

                $payment = Payment::create([
                    'date' => \request()->input('date'),
                    'transaction_id' => $transaction->id,
                    'payment_no' => $code,
                    'school_id' => $user->school,
                    'amount' => $item['total_due'],
                    'method' => \request('method'),
                    'account_id' => \request()->input('account_id'),
                    'created_by' => $user->id,
                ]);

                //now add account transaction

                AccountTransaction::create([
                    'date' => \request()->input('date'),
                    'school_id' => $user->school,
                    'transaction_id' => $transaction->id,
                    'account_id' => \request()->input('account_id'),
                    'amount' => $item['total_due'],
                    'type' => $transaction->type == 'sale' ? 'credit' : 'debit',
                    'payment_id' => $payment->id,
                ]);

                DB::commit();

                toastr()->success('Success');

                return redirect()->route('payments.index');

            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    function getPaymentRow()
    {

        $id = \request()->input('id');

        $item = Transaction::findOrFail($id);

        $payments = $item->payments;

        $totalPaid = $payments->sum("amount");

        $index = \request()->input('index', 1);

        return view('payment.payment-item-row', compact('item', 'index', 'totalPaid'));
    }

    //create direct and indirect payment

    function createIndirectPayment(Request $request)
    {
        $accountHolders = User::getForDropdown();

        return view('book-keeping.payment.indirect.create', compact('accountHolders'))
            ->with(['paymentMethods' => $this->paymentMethods]);
    }

    function postIndirectPayment(Request $request)
    {

        $user = auth()->user();

        $validatedData = $request->validate([
            'unique_no' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'required|string',
            'amount' => 'required|numeric',
            'method' => 'required|string',
            'comment' => 'nullable|string',
            'is_reconciled' => 'required',
        ]);

        $validatedData['type'] = 'indirect';
        $validatedData['school_id'] = $user->school_id;
        $validatedData['created_by'] = $user->id;

        DB::beginTransaction();

        try {

            $code = (new TransactionUtil())->generateInvoiceNumber('payment', $user->school_id, 'PAY');

            $validatedData['payment_no'] = $code;

            Payment::create($validatedData);

            DB::commit();

            toastr()->success(__('added'));

            return redirect()->back();

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        }

    }

    function createDirectPayment(Request $request)
    {

        $accountHolders = User::getForDropdown();

        $unpaidInvoices = Transaction::where("payment_status", '<>', 'paid')
            ->orWhereNull('payment_status')
            ->get();

        $bankAccounts = BankAccount::getForDropdown();

        $inv = $request->input('inv');

        $invoice = null;
        if (!empty($inv)) {
            $invoice = Transaction::findOrFail($inv);
        }

        //dd($invoice->toArray());

        //dd($unpaidInvoices->toArray());

        return view('book-keeping.payment.direct.create', compact('accountHolders', 'unpaidInvoices', 'bankAccounts', 'invoice'))
            ->with(['paymentMethods' => $this->paymentMethods]);
    }

    function postDirectPayment(Request $request)
    {

        $user = auth()->user();


        $validatedData = $request->validate([
            'date' => 'required|date',
            //'account_holder_id' => 'required|string',
            'method' => 'required|string',
            'comment' => 'nullable|string',
            'account_id' => 'required',
        ]);

        $validatedData['type'] = 'indirect';
        $validatedData['school_id'] = $user->school_id;
        $validatedData['created_by'] = $user->id;

        //create batch payment

        $items = $request->input('items');

        DB::beginTransaction();

        try {

            foreach ($items as $item) {

                $paymentNo = (new TransactionUtil())->generateInvoiceNumber('payment', $user->school_id, 'PAY');

                $inv = Transaction::with('payments')->find($item['invoice_id']);

                //get total payments for this invoice
                $totalPaid = $inv->payments->sum('amount');
                $currentAmount = $item['amount'];

                $total = $totalPaid + $currentAmount;

                $status = 'due';

                if (($total) >= $inv->amount) {
                    $status = 'paid';
                } else if ($total > 0) {
                    $status = 'partial';
                }

                $inv->payment_status = $status;
                $inv->save();

                $validatedData['amount'] = $item['amount'];
                $validatedData['transaction_id'] = $inv->id;
                $validatedData['unique_no'] = uniqid();
                $validatedData['user_id'] = $inv->user_id;
                $validatedData['payment_no'] = $paymentNo;


                Payment::create($validatedData);
            }

            DB::commit();

            toastr()->success(__('added'));

            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }

    }

    function getDirectPaymentRow()
    {

        $id = \request()->input('id');
        $index = \request()->input('index');

        $item = Transaction::findOrFail($id);

        return view("book-keeping.payment.direct.item-row", compact('item', 'index'));

    }

}
