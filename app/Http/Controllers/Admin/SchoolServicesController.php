<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use DB;
use App\Models\School;
use App\Models\Users;

class SchoolServicesController extends Controller
{

    public function index()
    {
        $user = \auth()->user();
        $school_info = $user->school;
        return view('school_services.index', compact('school_info'));
    }


    public function edit($id)
    {

        $school_info = School::where('id', $id)->first();
        return view('school_services.edit', compact('school_info'));

    }


    public function update(Request $request)
    {
        $request->validate([
            'services' => 'required',
        ]);

        $user = auth()->user();
        $school = $user->school;
        $school->services = $request->input('services');
        $school->save();

        return redirect()->route('SchoolServices.index')
            ->with('success', 'School Services updated successfully');
    }

}
