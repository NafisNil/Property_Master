<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeAttendanceController extends Controller
{
    function index()
    {
        if(\request()->ajax()) {
            $attendances = EmployeeAttendance::query();

            return DataTables::of($attendances)
                ->addColumn('actions', function ($row){
                    return view('log.employee-attendance.action-buttons', compact('row'));
                })
                ->make(true);

        }
        return view("log.employee-attendance.index");
    }

    function create()
    {
        return view('log.employee-attendance.create');
    }

    function store(Request $request)
    {
        $user = auth()->user();

        $data = $request->only([
            'date', 'employee_name', 'time_in', 'time_out'
        ]);

        $data['school_id'] = $user->school;

        EmployeeAttendance::create($data);

        return redirect()->route('employee-attendance-logs.index');
    }

    function edit($id){
        $employeeAttendance = EmployeeAttendance::findOrFail($id);

        return view('log.employee-attendance.edit',compact('employeeAttendance'));
    }

    function update(Request $request, $id){

        $user = auth()->user();

        $data = $request->only([
            'date', 'employee_name', 'time_in', 'time_out'
        ]);

        $employeeAtt = EmployeeAttendance::findOrFail($id);

        $employeeAtt->update($data);

        return redirect()->route('employee-attendance-logs.index');

    }

    function show($id){

        $employeeAttendance = EmployeeAttendance::findOrFail($id);

        return view('log.employee-attendance.show', compact('employeeAttendance'));
    }
    function destroy(){

    }

}
