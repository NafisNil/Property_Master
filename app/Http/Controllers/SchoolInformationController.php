<?php

namespace App\Http\Controllers;

use App\Models\SchoolInformation;
use Illuminate\Http\Request;

class SchoolInformationController extends Controller
{

    function index($type)
    {

        $info = SchoolInformation::findByType($type);

        return view('school_information.index', compact('info', 'type'));

    }

    function store(Request $request)
    {

        $user = auth()->user();

        $type = $request->input('type');

        if (!empty($request->input('id'))) {
            $info = SchoolInformation::find($request->input('id'));
        } else {
            $info = new SchoolInformation();
            $info->type = $type;
            $info->school_id = $user->school_id;
        }


        //common

        $info->content = $request->input('content');

        $info->save();

        toastr()->success('Information updated');


        return redirect()->route('information.index', ['type' => $type]);

    }
}
