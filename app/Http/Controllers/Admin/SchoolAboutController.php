<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\Users;

class SchoolAboutController extends Controller
{

    public function index()
    {
        $user = \auth()->user();
        $school = $user->school;
        return view('school_about.index', compact('school'));
    }


    public function edit()
    {
        $user = \auth()->user();
        $school = $user->school;
        return view('school_about.edit', compact('school'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'about' => 'required',
        ]);

        $user = \auth()->user();

        $school = $user->school;
        $school->about = $request->input('about');
        $school->save();

        return redirect()->route('SchoolAbout.index')
            ->with('success', 'About school updated successfully');
    }
}
