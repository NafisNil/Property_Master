<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\IvetoryCategories;
use App\Models\School;
use DB;

class AdminHomeController extends Controller {

    public function __construct() {
         if(!Auth::check()){
            return redirect()->route('authenticate.login');
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome() {
        $user = Auth::user();
        dd($user);
        return view('accounting.index');
    }

}
