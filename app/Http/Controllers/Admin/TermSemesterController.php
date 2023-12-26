<?php

namespace App\Http\Controllers\Admin;

use App\Models\AcademicYear;
use App\Models\SchoolCampus;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\TermSemester;
use Yajra\DataTables\DataTables;

class TermSemesterController extends BaseController
{
    public function index()
    {

        $this->checkPermission('semester.view');

        if (\request()->ajax()) {
            $query = TermSemester::with(['campus', 'academicYear'])->get();
            return DataTables::of($query)
                ->addColumn('action', function ($row){
                    return view('academical.term-semester.action-buttons', compact('row'));
                })
                ->addColumn('select', function ($row){
                    return "<input type='checkbox' name='td-select' class='row-select'/>";
                })
                ->rawColumns(['action', 'select'])
                ->make(true);
        }

        return view('academical.term-semester.index');
    }

    public function create()
    {

        $this->checkPermission('semester.create');

        $user = \auth()->user();
        $campuses = SchoolCampus::getForDropdown();

        $academicYears = AcademicYear::pluck('name', 'id');

        return view('academical.term-semester.create', compact('campuses', 'academicYears'));
    }

    public function store(Request $request)
    {

        $this->checkPermission('semester.create');

        $user = \auth()->user();

        $request->validate([
            'code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'campus_id' => 'required',
        ]);

        $data = $request->only([
            'code', 'start_date', 'end_date', 'campus_id',
            'academic_year_id', 'status'
        ]);

        $data['school_id'] = $user->school_id;

        TermSemester::create($data);

        return redirect()->route('TermSemester.index')
            ->with('success', 'Information added successfully.');
    }


    public function edit($id)
    {

        $this->checkPermission('semester.edit');


        $user_id = Auth::user()->id;

        $campuses = School::pluck('name', 'id');

        $academicYears = AcademicYear::pluck('name', 'id');

        $semester = TermSemester::findOrFailByUniqueId($id);

        return view('academical.term-semester.edit', compact('campuses', 'academicYears', 'semester'));

    }

    public function update(Request $request, $id)
    {

        $this->checkPermission('semester.edit');

        $request->validate([
            'code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'campus_id' => 'required',
        ]);

        $termSemester = TermSemester::findOrFailByUniqueId($id);
        $termSemester->update($request->all());

        return redirect()->route('TermSemester.index')
            ->with('success', 'Information successfully updated.');
    }

    function destroy($id){
        $semester = TermSemester::findOrFailByUniqueId($id);
        $semester->delete();
        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

}
