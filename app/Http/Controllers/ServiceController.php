<?php

namespace App\Http\Controllers;

use App\Models\ChartAccount;
use App\Models\ChartAccountCategory;
use App\Models\FixedAsset;
use App\Models\FixedAssetType;
use App\Models\Item;
use App\Models\Service;
use App\Models\ItemType;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (request()->ajax()) {

            $items = Item::with("type")
                ->where('item_type', 'service');

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/services/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/services/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
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

        return view('service.index');

    }

    function create()
    {
        $serviceTypes = ItemType::whereNull('parent_id')
            ->pluck('name', 'id');

        return view('service.create', compact('serviceTypes'));
    }

    function store()
    {
        \request()->validate([
            'name' => 'required',
            'code' => 'string',
            'type_id' => 'required',
            'cost' => 'numeric|required',

        ]);

        $data = \request()->only([
            'name', 'code', 'type_id', 'cost',
            'status', 'description'
        ]);

        $user = auth()->user();

        $data['school_id'] = $user->school_id;
        $data['item_type'] = 'service';

        try {

            Item::create($data);

            return redirect()->route('services.index');

        } catch (\Exception $exception) {
            return back()->withErrors(['message' => $exception->getMessage()]);
        }


    }

    function edit($id)
    {
        $item = Item::findOrFail($id);

        $serviceTypes = ItemType::pluck('name', 'id');

        return view('service.edit', compact('item', 'serviceTypes'));
    }

    function update($id)
    {

        \request()->validate([
            'name' => 'required',
            'code' => 'string',
            'type_id' => 'required',
            'cost' => 'numeric|required',

        ]);

        $user = auth()->user();


        try {

            $service = Item::findOrFail($id);
            $service->name = \request()->input('name');
            $service->cost = \request()->input('cost');
            $service->type_id = \request()->input('type_id');
            $service->status = \request()->input('status');
            $service->code = \request()->input('code');
            $service->description = \request()->input('description');

            $service->save();

            toastr()->success('Service Updated');

            return redirect()->route('services.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage(), 'Something went wrong');
            return back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function destroy($id)
    {

        $item = Item::findOrFail($id);

        try {
            $item->delete();
            return response()->json(['status' => 'success', 'message' => 'Item Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function getChildCategories()
    {
        $id = \request()->input('id');

        $categories = ChartAccountCategory::where('parent_id', $id)
            ->select('id', 'name')->get();

        return response()->json($categories);

    }

    function getServiceRow()
    {

        $id = \request()->input('id');

        //$type = \request('type', 'service');

        $index = \request()->input('index', 1);

        $service = Item::findOrFail($id);

        $accounts = ChartAccount::pluck('name', 'id');

        return view('purchase-offer.item-row', compact('service', 'accounts', 'index'));
    }

    function getServices()
    {
        $services = Item::
        where('type', 'service')
            ->all();

        return response()->json($services);
    }

}
