<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminUserController extends Controller
{
    function index(Request $request)
    {

        if ($request->ajax()) {
            $users = Admin::query();

            DataTables::of($users)
                ->make(true);

        }

        return view("admin.user.index");

    }

    function create(){
        return view("admin.user.create");
    }

}
