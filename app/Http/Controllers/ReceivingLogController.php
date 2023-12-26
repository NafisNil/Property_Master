<?php

namespace App\Http\Controllers;

use App\Models\ReceivingLog;
use App\Models\ShippingLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReceivingLogController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            $query = ReceivingLog::query();

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view('log.receiving.action-button', compact('row'));
                })
                ->make(true);
        }

        return view('log.receiving.index');
    }


    public function create()
    {
        return view('log.receiving.create');
    }


    public function store(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'receiving_no' => 'required|string',
            'date' => 'required|date',
            'items' => 'required|string',
            'sender_name' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_address' => 'required|string',
            'courier_company' => 'required|string',
            'confirmation_no' => 'required|string',
        ]);

        $validatedData['school_id'] = auth()->id();

        // Create a new shipment record
        ReceivingLog::create($validatedData);

        // Redirect to a success page or any other page you prefer
        return redirect()->route('receiving-logs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $receivingLog = ReceivingLog::findOrFail($id);

        return view('log.receiving.edit', compact('receivingLog'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'receiving_no' => 'required|string',
            'date' => 'required|date',
            'items' => 'required|string',
            'sender_name' => 'required|string',
            'sender_phone' => 'required|string',
            'sender_address' => 'required|string',
            'courier_company' => 'required|string',
            'confirmation_no' => 'required|string',
        ]);

        $receivingLog = ReceivingLog::findOrFail($id);

        $receivingLog->update($validatedData);

        return redirect()->route('receiving-logs.index');
    }


    public function destroy(Request $request, $id)
    {
        $receivingLog = ReceivingLog::findOrFail($id);
        $receivingLog->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);

    }
}
