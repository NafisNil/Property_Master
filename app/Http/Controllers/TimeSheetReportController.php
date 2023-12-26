<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\Department;
use App\Models\TimeSheetItem;
use App\Models\TimeSheetReport;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TimeSheetReportController extends Controller
{


    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $timeSheets = TimeSheetReport::query();

            return DataTables::of($timeSheets)
                ->addColumn('actions', function ($row) {
                    return view('time-sheet.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('time-sheet.index');
    }

    function create()
    {

        $user = auth()->user();

        $priorityLevels = StaticData::getPriorityLevels();

        $departments = Department::getForDropdown();

        $stuffs = User::getForDropdown('stuff');

        return view('time-sheet.create', compact('priorityLevels', 'departments', 'stuffs'));
    }

    function store()
    {

        $user = auth()->user();

        request()->validate([
            'sheet_no' => 'required',
        ]);


        $data = request()->only([
            'sheet_no', 'date', 'employee_name',
            'department_id', 'start_period', 'end_period',
            'pay_period',
        ]);

        $data['school_id'] = $user->school;

        try {

            $timeSheet = TimeSheetReport::create($data);

            //items

            foreach (\request()->input('items') as $item) {
                TimeSheetItem::create([
                   'time_sheet_id' => $timeSheet->id,
                   'date' => $item['date'],
                   'time_in' => $item['time_in'],
                   'time_out' => $item['time_out']
                ]);
            }

            toastr()->success('TimeSheet Added');

            return redirect()->route('time-sheets.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function show($id)
    {

        $timeSheet = TimeSheetReport::with('department')
            ->where('id', '=', $id)
            ->first();

        return view('time-sheet.view', compact('timeSheet'));
    }

    function edit($id)
    {

        $user = auth()->user();

        $timeSheet = TimeSheetReport::with('items')
            ->findOrFail($id);

        $departments = Department::getForDropdown();

        return view('time-sheet.edit', compact('timeSheet', 'departments'));
    }

    function update($id)
    {

        $user = auth()->user();

        $data = request()->only([
            'sheet_no', 'date', 'employee_name',
            'department_id', 'start_period', 'end_period',
            'pay_period',
        ]);

        $timeSheet = TimeSheetReport::findOrFail($id);

        try {

            $timeSheet->update($data);

            $timeSheet->items()->delete();

            foreach (\request()->input('items') as $item) {
                TimeSheetItem::create([
                    'time_sheet_id' => $timeSheet->id,
                    'date' => $item['date'],
                    'time_in' => $item['time_in'],
                    'time_out' => $item['time_out']
                ]);
            }

            toastr()->success('Incident updated');

            return redirect()->route('time-sheets.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function destroy($id)
    {
        $timeSheet = TimeSheetReport::findOrFail($id);

        try {
            $timeSheet->delete();
            return response()->json(['status' => 'success', 'message' => 'Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }

    }


}
