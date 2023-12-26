<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\Users;
use App\Models\DailyReport;
use App\Models\UserType;
use Yajra\DataTables\DataTables;

class DailyReportController extends BaseController
{

    public function index()
    {
       $this->checkPermission('daily-report.view');

        if (\request()->ajax()) {
            $query = DailyReport::with('department');

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view("daily_report.action-button", compact('row'));
                })
                ->make(true);
        }

        return view('daily_report.index');
    }


    public function create()
    {
        $this->checkPermission('daily-report.create');

        $departments = Department::getForDropdown();

        return view('daily_report.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $this->checkPermission('daily-report.create');

        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'department_id' => 'required',
        ]);


        $data = $request->only([
            "date",
            "name",
            "department_id",
            "start_time",
            "end_time",
            "description",
            "comment",
        ]);

        $user = \auth()->user();

        $data['school_id'] = $user->school_id;

        DailyReport::create($data);

        return redirect()->route('DailyReport.index')
            ->with('success', 'Information added successfully.');
    }

    public function edit($id)
    {

        $this->checkPermission('daily-report.edit');

        $dailyReport = DailyReport::where('id', $id)->first();

        $departments = Department::getForDropdown();

        return view('daily_report.edit', compact('dailyReport', 'departments'));

    }


    public function update(Request $request, $id)
    {
        $this->checkPermission('daily-report.edit');

        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'department_id' => 'required'
        ]);

        $report = DailyReport::find($id);

        $data = $request->only([
            "date",
            "name",
            "department_id",
            "start_time",
            "end_time",
            "description",
            "comment",
        ]);

        $report->update($data);

        return redirect()->route('DailyReport.index')
            ->with('success', 'Information successfully updated.');
    }


    public function destroy($id)
    {

        $this->checkPermission('daily-report.delete');

        $item = DailyReport::find($id);
        $item->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);

    }


    public function details($id)
    {
        $course_out = DailyReport::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">ID No:</th>';
        $html .= '<td>' . $course_out->id_no . '</td></tr>';

        $html .= '<tr><th scope="row">Name :</th>';
        $html .= '<td>' . $course_out->name . '</td></tr>';

        $html .= '<tr><th scope="row">Account Holder Type :</th>';
        $html .= '<td>' . $course_out->account_type . '</td></tr>';

        $dept = \App\Models\Department::where('id', $course_out->department)->first();
        $html .= '<tr><th scope="row">Department :</th>';
        $html .= '<td>' . $dept->name . '</td></tr>';

        $html .= '<tr><th scope="row">Date and Day :</th>';
        $html .= '<td>' . $course_out->date_and_day . '</td></tr>';

        $html .= '<tr><th scope="row">From:</th>';
        $html .= '<td>' . $course_out->reporting_time_from . '</td></tr>';

        $html .= '<tr><th scope="row">To:</th>';
        $html .= '<td>' . $course_out->reporting_time_to . '</td></tr>';

        $html .= '<tr><th scope="row">From:</th>';
        $html .= '<td>' . $course_out->time_from . '</td></tr>';

        $html .= '<tr><th scope="row">To:</th>';
        $html .= '<td>' . $course_out->time_to . '</td></tr>';

        $html .= '<tr><th scope="row">Comment:</th>';
        $html .= '<td>' . $course_out->comment . '</td></tr>';

        $status = 'In Active';
        if ($course_out->status == 1) {
            $status = 'Active';
        }
        $html .= '<tr><th scope="row">Status:</th>';
        $html .= '<td>' . $status . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

}
