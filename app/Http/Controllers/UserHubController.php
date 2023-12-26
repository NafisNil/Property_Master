<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\ClassAttendance;
use App\Models\MarkAppeal;
use App\Models\SchoolClass;
use App\Models\SchoolNotice;
use App\Models\SubjectCourse;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserHubController extends Controller
{

    function userHub($type)
    {

        if (\request()->ajax()) {

            $users = User::whereUserType($type);

            return DataTables::of($users)
                ->addColumn('action', function ($row) use ($type) {
                    return "<a href='$type-hub/$row->id' class='btn btn-primary'>View</a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('user.user-hub');
    }

    function studentHub()
    {

        if (\request()->ajax()) {

            $users = User::with(['detail.program', 'detail.gradeYear'])->whereUserType('student');

            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    return "<a href='students-hub/$row->id' class='btn btn-primary'>View</a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('user.student-hub');

    }

    function teacherAndEmployeeHub($type)
    {

        $userType = UserType::where('slug', $type)
            ->first();

        //dd($userType);

        $users = User::with('add')
            ->whereUserType($type);

        if (\request()->ajax()) {

            return DataTables::of($users)
                ->addColumn('action', function ($row) use ($type) {
                    return "<a href='$type-hub/$row->id' class='btn btn-primary'>View</a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('user.teacher-employee-hub', compact('userType'));

    }

    function sellerHub()
    {

        $users = User::with('add')
            ->whereUserType('seller');

        if (\request()->ajax()) {

            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    return "<a href='seller-hub/$row->id' class='btn btn-primary'>View</a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('user.seller-hub');

    }

    function parentHub()
    {

        $users = User::with('add')
            ->whereUserType('parent');

        if (\request()->ajax()) {

            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    return "<a href='parent-hub/$row->id' class='btn btn-primary'>View</a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('user.parent-hub');

    }

    function serviceProviderHub()
    {

        $users = User::with('add')
            ->whereUserType('service-provider');

        if (\request()->ajax()) {

            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    return "<a href='seller-hub/$row->id' class='btn btn-primary'>View</a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('user.service-provider-hub');

    }

    function getStudentProfile($id)
    {

        $student = User::with(['detail', 'add', 'courses', 'doctor', 'caseManager',
            'members', 'attachments', 'car', 'emergencyContact', 'detail.studentType', 'detail.guardian',
            'detail.academicYear', 'detail.gradeYear'
        ])->findOrFail($id);

        $courses = $student->courses->pluck('id');

        $classes = SchoolClass::with(['schedules', 'teacher', 'course'])->whereIn('subject_course_id', $courses)
            ->get();

        $assessments = Assessment::with('course')->whereHas('students', function ($query) use ($student) {
            $query->where('id', $student->id);
        });

        $teachers = User::whereIn('id', $classes->pluck('teacher_id'))
            ->get();

        $markAppeals = MarkAppeal::with(['fromStudent', 'toTeacher', 'assessment', 'course', 'semester'])
            ->where('from_student_id', $id)
            ->get();

        $attendances = ClassAttendance::where('student_id', $id)
            ->get();

        $notices = SchoolNotice::where(function ($query) use ($id) {
            $query->where('from_user_id', $id)
                ->orWhere('to_user_id', $id);
        })
            ->get();


        return view("user.student-profile", compact('student', 'classes', 'assessments', 'teachers', 'markAppeals', 'attendances', 'notices'));
    }

    function userProfile($type, $id)
    {

        $accountHolder = User::with(['add', 'corporation', 'insurance'])
            ->where('id', $id)
            ->first();

        return view("user.user-profile", compact('accountHolder'));
    }

    function parentProfile($id)
    {
        $accountHolder = User::with(['add', 'contact', 'emergencyContact'])
            ->where('id', $id)
            ->first();

        return view('user.parent-profile', compact('accountHolder'));
    }

    function teacherProfile($type, $id)
    {

        $userType = UserType::where('slug', $type)
            ->first();

        $notices = SchoolNotice::where(function ($query) use ($id) {
            $query->where('from_user_id', $id)
                ->orWhere('to_user_id', $id);
        })
            ->get();

        $accountHolder = User::with(['add', 'contact', 'emergencyContact'])
            ->where('id', $id)
            ->first();

        //$courses = $student->courses->pluck('id');

        $classes = SchoolClass::with(['schedules', 'teacher', 'course'])
            ->where('teacher_id', $id)
            ->get();

        $courses = SubjectCourse::whereIn('id', $classes->pluck('subject_course-id'))
            ->get();

        $assessments = Assessment::with('course')
            ->whereIn('class_id', $classes->pluck('id'))
            ->get();

        $markAppeals = MarkAppeal::with(['fromStudent', 'toTeacher', 'assessment', 'course', 'semester'])
            ->where('to_teacher_id', $id)
            ->get();


        return view('user.teacher-profile', compact('accountHolder', 'userType', 'type', 'notices', 'classes', 'markAppeals', 'courses', 'assessments'));
    }

    function sellerProfile($type, $id)
    {

        $userType = UserType::where('slug', $type)
            ->first();

        $accountHolder = User::with(['add', 'corporation.license', 'insurance', 'licenses.contact'])
            ->where('id', $id)
            ->first();

        //dd($accountHolder->toArray());

        return view("user.seller-profile", compact('accountHolder', 'userType', 'type'));

    }

}
