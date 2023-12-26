<?php

namespace App\Http\Controllers;

use App\DataTables\AcademicYearsDataTable;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;

class AcademicYearController extends BaseController
{
    function index(AcademicYearsDataTable $dataTable)
    {
        $this->checkPermission('academic-year.view');
        return $dataTable->render('academical.academic-year.index');
    }

    function create()
    {
        $this->checkPermission('academic-year.create');
        return view('academical.academic-year.create');
    }

    function store(Request $request)
    {

        $this->checkPermission('academic-year.create');

        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $data = $request->only(['name', 'start_date', 'end_date']);

        $data['school_id'] = $user->school_id;

        AcademicYear::create($data);

        toastr()->success('Academic Year created successfully');

        return redirect()->route('academic-years.index');

    }

    function edit($id)
    {
        $this->checkPermission('academic-year.edit');

        $academicYear = AcademicYear::findOrFail($id);

        return view('academical.academic-year.edit', compact('academicYear'));
    }

    function update($id, Request $request)
    {

        $this->checkPermission('academic-year.edit');

        $academicYear = AcademicYear::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $academicYear->name = $request->input('name');
        $academicYear->start_date = $request->input('start_date');
        $academicYear->end_date = $request->input('end_date');
        $academicYear->save();

        toastr()->success('Academic Year Updated Successfully');

        return redirect()->route('academic-years.index');

    }

    function delete()
    {

    }

    function makeDefault($id)
    {
        $academicYear = AcademicYear::findOrFail($id);

        //find previous default one

        $previousDefault = AcademicYear::where('is_default', true)
            ->first();

        if (!empty($previousDefault)) {
            //if exists then remove default property
            $previousDefault->is_default = false;
            $previousDefault->save();
        }

        //now make it default

        $academicYear->is_default = true;
        $academicYear->save();

        return response()->json(['status' => 'success', 'message' => 'Success']);

    }

}
