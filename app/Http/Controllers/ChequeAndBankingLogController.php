<?php

namespace App\Http\Controllers;

use App\Models\ChequeAndBankingLog;
use App\Models\MailLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ChequeAndBankingLogController extends Controller
{
    protected $types = [
        'cheque' => 'Cheque',
        'cash' => 'Cash',
    ];

    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $logs = ChequeAndBankingLog::where('school_id', $user->school);

            return DataTables::of($logs)
                ->addColumn('actions', function ($row) {
                    return view('log.cheque-banking-log.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('log.cheque-banking-log.index');
    }

    function create()
    {
        return view('log.cheque-banking-log.create')
            ->with(['types' => $this->types]);
    }

    function show($id)
    {
        $chequeAndBankingLog = ChequeAndBankingLog::findOrFail($id);

        return view('log.cheque-banking-log.show', compact('chequeAndBankingLog'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $data = $request->only([
            'date', 'tracking_no', 'sender', 'recipient',
            'employee_name', 'description', 'date_received',
            'type', 'carrier_company'
        ]);

        $data['school_id'] = $user->school;

        ChequeAndBankingLog::create($data);

        return redirect()->route('cheque-banking-logs.index');
    }

    function edit($id)
    {
        $chequeAndBankingLog = ChequeAndBankingLog::findOrFail($id);

        return view('log.cheque-banking-log.edit', compact('chequeAndBankingLog'))
            ->with(['types' => $this->types]);
    }

    function update(Request $request, $id)
    {
        $chequeAndBankingLog = ChequeAndBankingLog::findOrFail($id);

        $data = $request->only([
            'date', 'tracking_no', 'sender', 'recipient',
            'employee_name', 'description', 'date_received',
            'type', 'carrier_company'
        ]);

        $chequeAndBankingLog->update($data);

        return redirect()->route('cheque-banking-logs.index');

    }

    function destroy($id)
    {
        $chequeAndBanking = ChequeAndBankingLog::findOrFail($id);

        $chequeAndBanking->delete($id);

        return response()->json(['status' => 'success', 'message' => 'Deleted']);

    }
}
