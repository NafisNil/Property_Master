<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\Department;
use App\Models\ProjectBudget;
use App\Models\ProjectDuration;
use App\Models\ProjectPayment;
use App\Models\ProjectTimeline;
use App\Models\TimeSheetItem;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{

    private $statuses = [
        "Not Started" => "Not Started",
        "In Progress" => "In Progress",
        "On Hold" => "On Hold",
        "Completed" => "Completed",
        "Delayed" => "Delayed",
        "Cancelled" => "Cancelled",
        "Behind Schedule" => "Behind Schedule",
        "Ahead of Schedule" => "Ahead of Schedule",
        "On Budget" => "On Budget",
        "Over Budget" => "Over Budget",
        "Scope Change" => "Scope Change",

    ];

    private $budgetTypes = [
        'addition' => 'Addition',
        'deduction' => 'Deduction',
    ];

    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $timeSheets = Project::query();

            return DataTables::of($timeSheets)
                ->addColumn('actions', function ($row) {
                    return view('project.action-buttons', compact('row'));
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('project.index');
    }

    function create()
    {

        $user = auth()->user();

        return view('project.create',)
            ->with(['statuses' => $this->statuses, 'budgetTypes' => $this->budgetTypes]);
    }

    function store()
    {

        $user = auth()->user();

        request()->validate([
            'project_no' => 'required',
        ]);


        $data = request()->only([
            'project_no', 'date', 'name',
            'location', 'status'
        ]);

        $data['school_id'] = $user->school;

        DB::beginTransaction();

        try {

            $project = Project::create($data);

            //items

            foreach (\request()->input('durations') as $item) {
                ProjectDuration::create([
                    'project_id' => $project->id,
                    'description' => $item['description'],
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'comment' => $item['comment'],
                ]);
            }

            //budgets

            foreach (\request()->input('budgets') as $item) {
                ProjectBudget::create([
                    'project_id' => $project->id,
                    'description' => $item['description'],
                    'amount_before_tax' => $item['amount_before_tax'],
                    'amount_after_tax' => $item['amount_after_tax'],
                    'tax_amount' => $item['tax_amount'],
                    'type' => $item['type'],
                ]);
            }

            foreach (\request()->input('tasks') as $item) {
                ProjectTimeline::create([
                    'project_id' => $project->id,
                    'task_name' => $item['name'],
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'status' => $item['status'],
                    'comment' => $item['comment'],
                ]);
            }

            //payments

            foreach (\request()->input('payments') as $item) {
                ProjectPayment::create([
                    'project_id' => $project->id,
                    'payment_no' => $item['payment_no'],
                    'due_date' => $item['due_date'],
                    'amount' => $item['amount'],
                    'balance' => $item['balance'],
                    'status' => $item['status']
                ]);
            }

            DB::commit();

            toastr()->success('TimeSheet Added');

            return redirect()->route('projects.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function show($id)
    {

        $project = Project::with(['budgets', 'durations', 'payments', 'timelines'])
            ->where('id', '=', $id)
            ->first();

        return view('project.view', compact('project'));
    }

    function edit($id)
    {

        $user = auth()->user();

        $project = Project::with(['budgets', 'durations', 'payments', 'timelines'])
            ->findOrFail($id);

        $departments = Department::getForDropdown();

        return view('project.edit', compact('project', 'departments'))
            ->with(['statuses' => $this->statuses, 'budgetTypes' => $this->budgetTypes]);
    }

    function update($id)
    {

        $user = auth()->user();

        $user = auth()->user();

        request()->validate([
            'project_no' => 'required',
        ]);


        $data = request()->only([
            'project_no', 'date', 'name',
            'location', 'status'
        ]);

        $data['school_id'] = $user->school;

        DB::beginTransaction();

        $project = Project::findOrFail($id);

        try {

            $project->update($data);

            $project->durations()->delete();

            //items

            foreach (\request()->input('durations') as $item) {
                ProjectDuration::create([
                    'project_id' => $project->id,
                    'description' => $item['description'],
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'comment' => $item['comment'],
                ]);
            }

            //budgets

            $project->budgets()->delete();

            foreach (\request()->input('budgets') as $item) {
                ProjectBudget::create([
                    'project_id' => $project->id,
                    'description' => $item['description'],
                    'amount_before_tax' => $item['amount_before_tax'],
                    'amount_after_tax' => $item['amount_after_tax'],
                    'tax_amount' => $item['tax_amount'],
                    'type' => $item['type'],
                ]);
            }

            $project->timelines()->delete();

            foreach (\request()->input('tasks') as $item) {
                ProjectTimeline::create([
                    'project_id' => $project->id,
                    'task_name' => $item['name'],
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'status' => $item['status'],
                    'comment' => $item['comment'],
                ]);
            }

            //payments

            $project->payments()->delete();

            foreach (\request()->input('payments') as $item) {
                ProjectPayment::create([
                    'project_id' => $project->id,
                    'payment_no' => $item['payment_no'],
                    'due_date' => $item['due_date'],
                    'amount' => $item['amount'],
                    'balance' => $item['balance'],
                    'status' => $item['status']
                ]);
            }

            DB::commit();

            toastr()->success('Project Updated Successfully');

            return redirect()->route('projects.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function destroy($id)
    {
        $project = Project::findOrFail($id);

        try {
            $project->delete();
            return response()->json(['status' => 'success', 'message' => 'Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }

    }
}
