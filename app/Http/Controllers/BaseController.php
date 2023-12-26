<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{

    function checkPermission($permission)
    {
        //if user role admin
        //or has permission then allow
        if (!auth()->user()->hasRole("SuperAdmin") && !auth()->user()->can($permission)) {
            abort('403');
        }
    }

}
