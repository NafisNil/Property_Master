<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Department;
use App\Models\JobOrder;
use App\Models\ServiceProvider;
use Dflydev\DotAccessData\Data;
use Illuminate\Queue\Jobs\Job;
use Yajra\DataTables\Facades\DataTables;

class JobOrderController extends Controller
{

    private $statuses = [
        'open' => 'Open',
        'assigned' => 'Assigned',
        'in_progress' => 'In Progress',
        'on_hold' => 'On Hold',
        'pending_review' => 'Pending Review',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
        'reopened' => 'Reopened'
    ];

    private $confirmations = [
        '0' => 'No',
        '1' => 'Yes',
    ];

    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $jobOrders = JobOrder::with('department');

            return DataTables::of($jobOrders)
                ->addColumn('actions', function ($row) {
                    return "<button class='btn btn-info view-job-order-btn' data-href='/job-orders/$row->id'>View</button>
                            <a href='/job-orders/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/job-orders/$row->id' class='btn btn-danger delete-job-order-btn'>Delete</button>";
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('job-orders.index');
    }

    function create()
    {

        $user = auth()->user();

        $priorityLevels = StaticData::getPriorityLevels();

        $departments = Department::getForDropdown();

        return view('job-orders.create', compact('priorityLevels', 'departments'))
            ->with(['statuses' => $this->statuses, 'confirmations' => $this->confirmations]);
    }

    function store()
    {

        $user = auth()->user();

        request()->validate([
            'job_order_no' => 'required',
        ]);


        //dd(request()->all());

        $jobOrderData = request()->only([
            'job_order_no', 'requested_by', 'requested_date',
            'department_id', 'status', 'phone_number', 'service_type',
            'service_location', 'description', 'priority_level',
            'other_information'
        ]);

        $jobOrderData['school_id'] = $user->school;

        try {

            JobOrder::create($jobOrderData);

            toastr()->success('Job Order created');

            return redirect()->route('job-orders.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function show($id)
    {

        $jobOrder = JobOrder::with('department')
            ->where('id', '=', $id)
            ->first();

        return view('job-orders.view', compact('jobOrder'));
    }

    function edit($id)
    {

        $user = auth()->user();

        $departments = Department::getForDropdown();

        $jobOrder = JobOrder::with(['department'])->findOrFail($id);

        return view('job-orders.edit', compact('jobOrder', 'departments'))
            ->with(['statuses' => $this->statuses, 'confirmations' => $this->confirmations]);
    }

    function update($id)
    {

        $user = auth()->user();

        request()->validate([
            'campus_id' => 'required|numeric',
            'building_id' => 'required|numeric',
            'issue_date' => 'required|date',
            'requested_date' => 'required|date',
            'service_provider_id' => 'required|numeric',
            'priority_level' => 'required|string'
        ]);


        $jobOrderData['school_id'] = $user->school;

        $jobOrder = JobOrder::findOrFail($id);

        try {

            $jobOrder->campus_id = request()->input('campus_id');
            $jobOrder->building_id = request()->input('building_id');
            $jobOrder->room_id = request()->input('room_id');
            $jobOrder->issue_date = request()->input('issue_date');
            $jobOrder->requested_date = request()->input('requested_date');
            $jobOrder->description = request()->input('description');
            $jobOrder->service_provider_id = request()->input('service_provider_id');

            $jobOrder->save();

            toastr()->success('Job Order Updated');

            return redirect()->route('job-orders.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return back()->withErrors($exception->getMessage());
        }

    }

    function destroy($id)
    {
        $jobOrder = JobOrder::findOrFail($id);

        try {
            $jobOrder->delete();
            return response()->json(['status' => 'success', 'message' => 'Deleted']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }

    }

}
