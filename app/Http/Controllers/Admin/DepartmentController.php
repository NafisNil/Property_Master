<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Models\Campus;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\Department;


class DepartmentController extends Controller
{

    public function index()
    {
        $type = \request()->query('type');
        $user = \auth()->user();

        $departments = Department::with(['campus'])
            ->where('school_id', $user->school_id)
            ->where('type', $type)
            ->get();

        //dd($departments->toArray());

        return view('departments.index', compact('departments'));
    }

    public function create()
    {

        $campuses = Campus::getForDropdown();
        $departmentTypes = StaticData::getDepartmentTypes();

        return view('departments.create', compact('campuses', 'departmentTypes'));
    }

    public function store(Request $request)
    {

        $validData = $request->validate([
            'name' => 'required|alpha_space',
            'type' => 'required|alpha_space',
            'head' => 'required|alpha_space',
            'campus_id' => 'nullable|numeric',
            'email' => 'required|email',
            'phone' => 'required',
            'operation_hour' => 'numeric',
            'status' => 'boolean',
        ]);

        $user = \auth()->user();
        $validData['created_by'] = $user->id;
        $validData['school_id'] = $user->school_id;

        Department::create($validData);

        $type = $request->input('type');

        return redirect()->route('Departments.index', ['type' => $type])
            ->with('success', 'Information added successfully.');
    }

    public function edit($id)
    {

        $department = Department::findOrFailByUniqueId($id);

        $campuses = Campus::getForDropdown();
        $departmentTypes = StaticData::getDepartmentTypes();

        return view('departments.edit', compact('department', 'campuses', 'departmentTypes'));

    }

    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'name' => 'required|alpha_space',
            'type' => 'required|alpha_space',
            'head' => 'required|alpha_space',
            'campus_id' => 'nullable|numeric',
            'email' => 'required|email',
            'phone' => 'required',
            'operation_hour' => 'numeric',
            'status' => 'boolean',
        ]);

        $department = Department::findOrFailByUniqueId($id);
        $department->update($validData);

        $type = $request->input('type');

        return redirect()->route('Departments.index', ['type' => $type])
            ->with('success', 'Information successfully updated.');
    }

    function show($id)
    {
        $department = Department::with('campus')
            ->where('unique_id', $id)
            ->firstOrFail();

        return view('departments.show', compact('department'));
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Color delete successfully');
    }
}
