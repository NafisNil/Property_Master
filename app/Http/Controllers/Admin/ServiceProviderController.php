<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use Yajra\DataTables\Facades\DataTables;

class ServiceProviderController extends Controller
{
    function index()
    {

        $user = auth()->user();

        $serviceProviders = ServiceProvider::where('school_id', $user->school);

        if (request()->ajax()) {
            return DataTables::of($serviceProviders)
                ->addColumn('actions', function ($row) {
                    return "<button class='btn btn-info view-service-provider-btn' data-href='/service-providers/$row->id'>View</button>
                            <a href='/service-providers/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/service-providers/$row->id' class='btn btn-danger delete-service-provider-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }


        return view('service-provider.index', compact('serviceProviders'));
    }

    function create()
    {
        return view("service-provider.create");
    }

    function show($id)
    {

        $serviceProvider = ServiceProvider::find($id);

        return view('service-provider.view', compact('serviceProvider'));
    }

    function store()
    {

        $user = auth()->user();

        \request()->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'contact_person_name' => 'required|string'
        ]);

        $serviceProviderData = \request()->only(['name', 'phone', 'email', 'contact_person_name']);

        $serviceProviderData['school_id'] = $user->school;

        try {
            ServiceProvider::create($serviceProviderData);
            toastr()->success('Service Provider Added');
            return redirect()->route('service-providers.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    function edit($id)
    {

        $serviceProvider = ServiceProvider::find($id);

        return view('service-provider.edit', compact('serviceProvider'));
    }

    function update($id)
    {

        $user = auth()->user();

        \request()->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'contact_person_name' => 'required|string'
        ]);

        $serviceProvider = ServiceProvider::findOrFail($id);

        try {

            $serviceProvider->name = \request()->name;
            $serviceProvider->phone = \request()->phone;
            $serviceProvider->email = \request()->email;
            $serviceProvider->contact_person_name = \request()->contact_person_name;

            $serviceProvider->save();

            toastr()->success('Service Provider Updated');

            return redirect()->route('service-providers.index');

        }catch (\Exception $exception){
            toastr()->error($exception->getMessage(), 'Error');
            return  redirect()->back()->withErrors($exception->getMessage());
        }

        // return
    }

    function destroy($id)
    {
        $serviceProvider = ServiceProvider::findOrFail($id);
        $serviceProvider->delete();
        return response()->json(['status' => 'success', 'message' => 'Service Provider Deleted']);
    }

}
