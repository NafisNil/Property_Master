<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\TaxType;
use Yajra\DataTables\Facades\DataTables;

class TaxController extends Controller
{

    private $reportingPeriods = [
        'monthly' => 'Monthly',
        'yearly' => 'Yearly',
        'quarterly' => 'Quarterly',
    ];

    function index()
    {
        $user = auth()->user();

        if (request()->ajax()) {

            $items = Tax::with("type");

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/taxes/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/taxes/$row->id' class='btn btn-danger delete-item-btn'>Delete</button>";
                })
                ->editColumn('type', function ($row) {
                    if (empty($row->type)) {
                        return '';
                    } else {
                        return $row->type->name;
                    }
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('tax.index');

    }

    function create()
    {
        $taxTypes = TaxType::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('tax.create', compact('taxTypes'))
            ->with(['reportingPeriods' => $this->reportingPeriods]);
    }

    function store()
    {

        //dd(\request()->all());

        \request()->validate([
            'name' => 'required',
            'code' => 'string',
            'tax_type_id' => 'required',
            'rate' => 'numeric|required',
            'office_name' => 'required',
            'office_address' => 'required',
            'office_phone' => 'required',
        ]);

        $data = \request()->only([
            'name', 'code', 'tax_type_id', 'rate',
            'status', 'office_name', 'office_phone', 'office_email',
            'office_website', 'office_address', 'reporting'
        ]);

        $user = auth()->user();

        $data['school_id'] = $user->school_id;

        try {

            Tax::create($data);

            return redirect()->route('taxes.index');

        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }


    }

    function edit($id)
    {
        $tax = Tax::findOrFail($id);

        $taxTypes = TaxType::pluck('name', 'id');


        return view('tax.edit', compact('tax', 'taxTypes'))
            ->with(['reportingPeriods' => $this->reportingPeriods]);
    }

    function update($id)
    {
        \request()->validate([
            'name' => 'required',
            'code' => 'string',
            'tax_type_id' => 'required',
            'rate' => 'numeric|required',
            'office_name' => 'required',
            'office_address' => 'required',
            'office_phone' => 'required',
        ]);

        $data = \request()->only([
            'name', 'code', 'tax_type_id', 'rate',
            'status', 'office_name', 'office_phone', 'office_email',
            'office_website', 'office_address', 'reporting'
        ]);

        $item = Tax::findOrFail($id);

        try {

            $item->update($data);

            return redirect()->route('taxes.index');

        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    function destroy($id)
    {

        $item = Tax::findOrFail($id);

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function getTax()
    {
        $id = request()->input('id');

        $tax = Tax::findOrFail($id);
        return response()->json($tax);
    }

}
