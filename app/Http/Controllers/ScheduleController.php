<?php

namespace App\Http\Controllers;

use App\Constants\StaticData;
use App\Models\BookingParticipant;
use App\Models\Schedule;
use App\Models\ScheduleParticipant;
use App\Models\ScheduleRecurrence;
use App\Models\ScheduleType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ScheduleController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {
            $query = Schedule::with('type')->where('school_id', $user->school_id);

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return view('schedule.action-button', compact('row'));
                })
                ->make(true);

        }

        return view("schedule.index");
    }

    function create()
    {

        $accountHolders = User::getForDropdown();
        $scheduleTypes = ScheduleType::getForDropdown();
        $scheduleRecurrences = StaticData::getScheduleRecurrences();

        return view('schedule.create', compact('accountHolders', 'scheduleTypes', 'scheduleRecurrences'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'schedule_no' => 'required',
            'title' => 'required',
            'date' => 'required',
            'schedule_type_id' => 'required',
            'prepared_by' => 'required',
            'location' => 'required',
        ]);

        $data = $request->only([
            'schedule_no', 'title', 'date', 'schedule_type_id', 'prepared_by', 'location',
            'comment'
        ]);

        $data['school_id'] = $user->school_id;

        DB::beginTransaction();

        try {

            $schedule = Schedule::create($data);

            foreach ($request->input('recurrences') as $recurrence) {
                ScheduleRecurrence::create([
                        'schedule_id' => $schedule->id,
                        'pattern' => $recurrence['pattern'],
                        'start_date' => $recurrence['start_date'],
                        'end_date' => $recurrence['end_date'],
                        'comment' => $recurrence['comment'],
                    ]
                );
            }

            foreach ($request->input('participants') as $participant) {
                ScheduleParticipant::create([
                    'schedule_id' => $schedule->id,
                    'name' => $participant['name'],
                    'type' => $participant['type'],
                ]);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();

            dd($e);

        }

    }

    function show($id)
    {

        $schedule = Schedule::with(['participants', 'recurrences', 'preparedBy.type'])
            ->findOrFail($id);

        return view("schedule.show", compact('schedule'));

    }

    function edit($id)
    {
        $schedule = Schedule::with(['participants', 'recurrences', 'preparedBy.type'])
            ->findOrFail($id);

        $accountHolders = User::getForDropdown();
        $scheduleTypes = ScheduleType::getForDropdown();
        $scheduleRecurrences = StaticData::getScheduleRecurrences();

        return view("schedule.edit", compact('schedule', 'scheduleTypes', 'accountHolders', 'scheduleRecurrences'));
    }

    function update(Request $request, $id)
    {
        $user = auth()->user();

        $schedule = Schedule::findOrFail($id);

        $request->validate([
            'schedule_no' => 'required',
            'title' => 'required',
            'date' => 'required',
            'schedule_type_id' => 'required',
            'prepared_by' => 'required',
            'location' => 'required',
        ]);

        $data = $request->only([
            'schedule_no', 'title', 'date', 'schedule_type_id', 'prepared_by', 'location',
            'comment'
        ]);

        DB::beginTransaction();

        try {

            $schedule->update($data);

            $schedule->recurrences()->delete();

            foreach ($request->input('recurrences') as $recurrence) {
                ScheduleRecurrence::create([
                        'schedule_id' => $schedule->id,
                        'pattern' => $recurrence['pattern'],
                        'start_date' => $recurrence['start_date'],
                        'end_date' => $recurrence['end_date'],
                        'comment' => $recurrence['comment'],
                    ]
                );
            }

            $schedule->participants()->delete();

            foreach ($request->input('participants') as $participant) {
                ScheduleParticipant::create([
                    'schedule_id' => $schedule->id,
                    'name' => $participant['name'],
                    'type' => $participant['type'],
                ]);
            }

            DB::commit();

            return redirect()->route('schedules.index');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);

        }
    }

    function destroy($id){
        $schedule = Schedule::findOrFail($id);

        $schedule->delete();

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
