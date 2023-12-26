<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurSchoolController extends Controller
{
    function getWelcomeMessage()
    {
        $user = auth()->user();
        $school = $user->school;

        return view('our-school.welcome.index', compact('school'));
    }

    function updateWelcomeMessage(Request $request)
    {

        $request->validate([
            'welcome' => 'required'
        ]);

        $user = auth()->user();
        $school = $user->school;
        $school->welcome = $request->input('welcome');
        $school->save();

        toastr()->success(__('updated'));

        return redirect()->back();
    }

}
