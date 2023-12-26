<?php

namespace App\Http\Controllers\Admin;

use App\Models\AcademicYear;
use App\Models\ClassAttendance;
use App\Models\Classroom;
use App\Models\ClassSchedule;
use App\Models\GradeYear;
use App\Models\EducationLevel;
use App\Models\SchoolProgram;
use App\Models\SubjectCourse;
use App\Models\TermSemester;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Users;
use App\Models\SchoolClass;
use Yajra\DataTables\DataTables;


class SchoolClassController extends Controller
{

    private $statuses = [
        'progress' => 'Progress',
        'canceled' => 'Canceled',
        'closed' => 'Closed',
    ];

    private $weekDays = [
        'mon' => 'Monday',
        'tue' => 'Tuesday',
        'wed' => 'Wednesday',
        'thu' => 'Thursday',
        'fri' => 'Friday',
        'sat' => 'Saturday',
        'sun' => 'Sunday',
    ];

    public function index()
    {
        $user = \auth()->user();

        if (\request()->ajax()) {

            //now perform class

            $classQuery = SchoolClass::with('course')
                ->where('school_id', $user->school_id);

            //if logged user is teacher then
            if ($user->isTeacher()) {
                $classQuery->where('teacher_id', $user->id);
            }

            if ($user->isStudent()) {

                /**
                 * pick student courses
                 * Then pick those class which course is same as student course
                 */

                $courses = $user->courses->pluck('id');

                $classQuery->whereIn('subject_course_id', $courses);
            }

            //filter by academic year

            $academicYear = \request()->input('academic_year');

            if (!empty($academicYear)) {
                $classQuery->where('academic_year_id', $academicYear);
            }

            $semester = \request()->input('semester');

            if (!empty($semester)) {
                $classQuery->where('semester_id', $semester);
            }

            $status = \request()->input('status');

            if (!empty($status)) {
                if ($status == 'progress') {
                    $classQuery->where('start_date', '<', now())
                        ->where('end_date', '>', now());
                }

                if ($status == 'closed') {
                    $classQuery->where('end_date', '<', now());
                }

            }


            return DataTables::of($classQuery)
                ->addColumn('action', function ($row) {
                    return view('academical.class.action-button', compact('row'));
                })
                ->addColumn('courseName', function ($row) {
                    return $row->course->title ?? '';
                })
                ->rawColumns(['action'])
                ->make(true);

        }

        $school_info = School::where('id', $user->school_id)->first();

        //data for filtering

        $academicYears = AcademicYear::pluck('name', 'id');

        $semesters = TermSemester::pluck('code', 'id');

        $classrooms = Classroom::getForDropdown();

        return view('academical.class.index', compact('school_info', 'academicYears', 'semesters', 'classrooms'))
            ->with(['statuses' => $this->statuses]);
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $teachers = User::getByType('teacher')
            ->pluck('full_name', 'id');

        $programs = SchoolProgram::pluck('program_name', 'id');

        $years = SchoolProgram::getGradeYearForDropdown();

        $academicYears = AcademicYear::getForDropdown();

        $semesters = TermSemester::getForDropdown();

        $subjectCourses = SubjectCourse::getForDropdown();

        return view('academical.class.create', compact('school_info', 'teachers', 'programs', 'academicYears', 'semesters', 'years', 'subjectCourses'));
    }

    public function store(Request $request)
    {

        $user = \auth()->user();

        $request->validate([
            'code' => 'required',
            'teacher_id' => 'required',
        ]);

        $data = $request->only([
            'code', 'teacher_id', 'program_id', 'name', 'academic_year_id', 'year_id', 'semester_id', 'semester_no',
            'subject_course_id', 'status', 'created_by', 'start_date', 'end_date'
        ]);

        $data['school_id'] = $user->school_id;

        $class = SchoolClass::create($data);

        //now add class schedule

        $class->schedules()->delete();

        foreach ($request->items as $item) {
            ClassSchedule::create([
                'school_id' => $user->school_id,
                'class_id' => $class->id,
                'room_id' => $item['room_id'],
                'day' => $item['day'],
                'start_time' => $item['start_time'],
                'end_time' => $item['end_time'],
                'type' => $request->input('type')
            ]);
        }

        toastr()->success('Class created successfully');

        return redirect()->route('SchoolClass.index')
            ->with('success', 'Information added successfully.');
    }

    public function show($id)
    {
        $schoolClass = SchoolClass::with(['teacher', 'program'])->findOrFail($id);

        $schedules = ClassSchedule::with(['classroom'])
            ->where('class_id', $id)
            ->get();

        return view('academical.class.view', compact('schoolClass', 'schedules'));
    }

    public function edit($id)
    {


        $schoolClass = SchoolClass::with('schedules')->findOrFail($id);

        $user = \auth()->user();
        $school_info = $user->school;

        $teachers = User::getByType('teacher')
            ->pluck('full_name', 'id');

        $programs = SchoolProgram::pluck('program_name', 'id');

        $years = SchoolProgram::getGradeYearForDropdown();

        $academicYears = AcademicYear::query()->pluck('name', 'id');

        $semesters = TermSemester::pluck('code', 'id');

        $subjectCourses = SubjectCourse::getForDropdown();

        $rooms = Classroom::getForDropdown();

        return view('academical.class.edit', compact('school_info', 'schoolClass', 'academicYears', 'subjectCourses', 'teachers', 'semesters', 'years', 'programs', 'school_info', 'rooms'))
            ->with(['weekDays' => $this->weekDays]);
    }

    public
    function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'code' => 'required',
        ]);
        $class = SchoolClass::find($request->id);
        $class->update($request->all());

        $class->schedules()->delete();

        foreach ($request->items as $item) {
            ClassSchedule::create([
                'school_id' => $user->school_id,
                'class_id' => $class->id,
                'room_id' => $item['room_id'],
                'day' => $item['day'],
                'start_time' => $item['start_time'],
                'end_time' => $item['end_time'],
                'type' => $request->input('type')
            ]);
        }

        return redirect()->route('SchoolClass.index')
            ->with('success', 'Information successfully updated.');
    }

    public
    function destroy($id)
    {
        $color = SchoolClass::find($id);
        $color->delete();
        return redirect()->route('school_class.index')
            ->with('success', 'Color delete successfully');
    }

    function getClassStudents()
    {
        $students = User::whereUserType('student')
            ->get();

        return response()->json($students);
    }

}
