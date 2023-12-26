<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    function changeLanguage(Request $request)
    {
        $request->validate([
            'lang' => 'required|string'
        ]);
        $lang = $request->input('lang');

        session()->put('lang', $lang);

        app()->setLocale($lang);

        //dd(app()->getLocale());

        return redirect()->back();
    }

}
