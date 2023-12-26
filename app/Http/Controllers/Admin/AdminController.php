<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;

class AdminController extends Controller
{
    function getSchools()
    {

        $schools = School::orderBy('created_at', 'desc')
            ->get();

        return view('admin.school', compact('schools'));
    }

    function toggleSchoolStatus($id)
    {
        //ajax request
        $school = School::findOrFail($id);

        $school->status = !$school->status;

        $school->save();

        return response()->json(['status' => 'success']);
    }

}
