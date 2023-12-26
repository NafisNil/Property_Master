<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubjectCourse;
use App\Models\SubjectsCoursesInSchoolProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\SchoolProgram;

class ProgramNavigatorController extends Controller
{

    public function index()
    {

        $user = \auth()->user();

        $ProgramNavigator = SchoolProgram::where('school_id', $user->school_id)
            ->select('id', 'program_code', 'program_name')->get();

        return view('program_navigator.index', compact( 'ProgramNavigator'));
    }


    public function manage()
    {
        $user = \auth()->user();
        $ProgramNavigator = SchoolProgram::where('school_id', $user->school_id)->select('id', 'program_code', 'program_name')->get();

        return view('program_navigator.manage', compact( 'ProgramNavigator'));
    }


    public function show($id)
    {

        $subjectCourses = SubjectsCoursesInSchoolProgram::join('subject_courses_in_school_program as SCSP', 'SCSP.subject')
            ->get();

        return response()->json($programs);
    }


}
