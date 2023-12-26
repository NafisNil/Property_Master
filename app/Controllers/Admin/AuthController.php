<?php

namespace App\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login()
    {
        return view('admin.auth.login');
    }

    function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (!auth('admin')->attempt($credentials)) {
            toastr()->error('Login failed');
            return redirect()->back();
        }

        return redirect()->route('admin.home');

    }
}
