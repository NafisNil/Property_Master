<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class CleanAllController extends Controller
{
    public function index()
    {
        \Artisan::call('cache:clear');
        \Artisan::call('route:cache');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');
        return redirect()->route('frontEnd.index');
    }
}
