<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\MaintenanceChecklist;
use Illuminate\Http\Request;

class MaintenanceChecklistController extends Controller
{
    function index(){
        return view('maintenance-checklist.index');
    }

    function create(){

        $periods = StaticData::getPeriods();

        return view('maintenance-checklist.create', compact('periods'));
    }

    function store(){

    }



}
