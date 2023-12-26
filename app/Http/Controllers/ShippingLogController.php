<?php

namespace App\Http\Controllers;

use App\Models\ShippingLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ShippingLogController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            $query = ShippingLog::query();

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view('log.shipping.action-button', compact('row'));
                })
                ->make(true);
        }

        return view('log.shipping.index');
    }


    public function create()
    {
        return view('log.shipping.create');
    }


    public function store(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'shipping_no' => 'required|string',
            'date' => 'required|date',
            'items' => 'required|string',
            'recipient_name' => 'required|string',
            'recipient_phone' => 'required|string',
            'recipient_address' => 'required|string',
            'courier_company' => 'required|string',
            'confirmation_no' => 'required|string',
        ]);

        $validatedData['school_id'] = auth()->id();

        // Create a new shipment record
        ShippingLog::create($validatedData);

        // Redirect to a success page or any other page you prefer
        return redirect()->route('shipping-logs.index');
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
        $shippingLog = ShippingLog::findOrFail($id);

        return view('log.shipping.edit', compact('shippingLog'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'shipping_no' => 'required|string',
            'date' => 'required|date',
            'items' => 'required|string',
            'recipient_name' => 'required|string',
            'recipient_phone' => 'required|string',
            'recipient_address' => 'required|string',
            'courier_company' => 'required|string',
            'confirmation_no' => 'required|string',
        ]);

        $shippingLog = ShippingLog::findOrFail($id);

        $shippingLog->update($validatedData);

        return redirect()->route('shipping-logs.index');
    }


    public function destroy(Request $request, $id)
    {
        $shippingLog = ShippingLog::findOrFail($id);
        $shippingLog->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);

    }
}
