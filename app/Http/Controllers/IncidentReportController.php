<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\Department;
use App\Models\IncidentReport;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IncidentReportController extends Controller
{

    private $confirmations = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $incidentReports = IncidentReport::with('department');

            return DataTables::of($incidentReports)
                ->addColumn('actions', function ($row) {
                    return view('incident-report.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('incident-report.index');
    }

    function create()
    {

        $user = auth()->user();

        $priorityLevels = StaticData::getPriorityLevels();

        $departments = Department::getForDropdown();

        $stuffs = User::getForDropdown('stuff');

        return view('incident-report.create', compact('priorityLevels', 'departments', 'stuffs'));
    }

    function store()
    {

        $user = auth()->user();

        request()->validate([
            'incident_no' => 'required',
        ]);


        //dd(request()->all());

        $data = request()->only([
            'incident_no', 'date', 'noticed_by',
            'department_id', 'report_to', 'title', 'incident_location',
            'incident_time',
            'cause', 'description', 'people_involved',
            'immediate_action_taken', 'emergency_called',
            'police_file_no', 'fire_department_file_no',
            'injured',
        ]);

        $data['school_id'] = $user->school;

        try {

            IncidentReport::create($data);

            toastr()->success('Incident Report Added');

            return redirect()->route('incident-reports.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function show($id)
    {

        $incidentReport = IncidentReport::with('department')
            ->where('id', '=', $id)
            ->first();

        return view('incident-report.view', compact('incidentReport'));
    }

    function edit($id)
    {

        $user = auth()->user();

        $departments = Department::getForDropdown();

        $incidentReport = IncidentReport::with(['department'])
            ->findOrFail($id);

        $stuffs = User::getForDropdown('stuff');

        return view('incident-report.edit', compact('incidentReport', 'departments', 'stuffs'))
            ->with(['confirmations' => $this->confirmations]);
    }

    function update($id)
    {

        $user = auth()->user();

        $data = \request()->only([
            'date', 'noticed_by',
            'department_id', 'report_to', 'title', 'incident_location',
            'incident_time',
            'cause', 'description', 'people_involved',
            'immediate_action_taken', 'emergency_called',
            'police_file_no', 'fire_department_file_no',
            'injured',
        ]);

        $data['school_id'] = $user->school;

        $incident = IncidentReport::findOrFail($id);

        try {

            $incident->update($data);

            toastr()->success('Incident updated');

            return redirect()->route('incident-reports.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function destroy($id)
    {
        $incidentReport = IncidentReport::findOrFail($id);

        try {
            $incidentReport->delete();
            return response()->json(['status' => 'success', 'message' => 'Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }

    }

}
