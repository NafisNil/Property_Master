<?php

namespace App\Http\Controllers;

use App\Models\AccountHolder;
use App\Models\AccountHolderLicense;
use App\Models\AccountHolderType;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Corporation;
use App\Models\Insurance;
use App\Models\License;
use App\Models\SchoolProgram;
use App\Models\StudentDetail;
use App\Models\TermSemester;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    function index()
    {

        $userType = UserType::where('slug', '=', 'student')
            ->first();

        if (empty($userType)) {
            return 'Account Type Not Found';
        }

        $accountHolders = User::where('user_type', $userType->id)
            ->get();


        $semesters = TermSemester::pluck('code', 'id');

        return view('student.index', compact('accountHolders', 'userType', 'semesters'));
    }

    function create(Request $request)
    {

        $parentsCollection = User::getByType('parent');

        $fathers = $parentsCollection->where('gender', 'male')
            ->pluck('full_name', 'id');
        $mothers = $parentsCollection->where('gender', 'female')->pluck('full_name', 'id');

        $parents = $parentsCollection->pluck('full_name', 'id');

        $programs = SchoolProgram::pluck('program_name', 'id');

        $years = [
            '1' => 'First Year',
            '2' => 'Second Year',
            '3' => 'Third Year',
            '4' => 'Fourth Year'
        ];

        $semesters = TermSemester::pluck('semester_code', 'id');

        return view('student.create', compact('programs', 'years', 'semesters', 'parents', 'fathers', 'mothers'));
    }

    function show($id)
    {
        $student = User::with(['add', 'detail.father', 'detail.mother', 'detail.semester', 'detail.program'])
            ->where('id', $id)
            ->first();
        //dd($student);

        return view("student.view", compact('student'));
    }

    function store(Request $request)
    {

        $request->validate([
            'student_id_no' => 'required',
            'program_id' => 'required',
            'semester_id' => 'required',
            'father_id' => 'required',
            'mother_id' => 'required',
            'guardian_id' => 'required',
            'email' => 'required',
        ]);

        $user = auth()->user();
        $schoolId = $user->school;

        $type = 'student';


        $accountType = UserType::where('slug', $type)
            ->first();

        $password = "123456";

        //todo now send this password to the user by email

        DB::beginTransaction();

        try {

            $addressData = [
                'country' => request()->input('country'),
                'state' => request()->input('state'),
                'city' => request()->input('city'),
                'zip' => request()->input('zip'),
                'name' => request()->input('address'),
                'street' => request()->input('street')
            ];

            $address = Address::create($addressData);

            $student = User::create([
                'school' => $schoolId,
                'user_type' => $accountType->id,
                'first_name' => request()->input('first_name'),
                'last_name' => request()->input('last_name'),
                'middle_name' => request()->input('middle_name'),
                'status' => request()->input('status') == 'active',
                'education' => request()->input('education'),
                'address' => $address->id,
                'email' => request()->input('email'),
                'password' => bcrypt($password),
                'mobile_phone' => request()->input("mobile_phone"),
            ]);

            //now add student information to student registration

            StudentDetail::create([
                'school_id' => $user->school,
                'user_id' => $student->id,
                'program_id' => request()->input('program_id'),
                'semester' => request()->input('semester_id'),
                'mother_id' => \request()->input('mother_id'),
                'father_id' => \request()->input('father_id'),
                'guardian_id' => \request()->input('guardian_id'),
                'student_id_no' => \request()->input('student_id_no'),
            ]);

            toastr()->success('Student Added');

            DB::commit();

            return redirect()->route('students.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }

    }

    function edit($id)
    {

        $student = User::with(['add', 'detail'])
            ->where('id', $id)
            ->firstOrFail();

        $parentsCollection = User::getByType('parent');

        $fathers = $parentsCollection->where('gender', 'male')
            ->pluck('full_name', 'id');
        $mothers = $parentsCollection->where('gender', 'female')->pluck('full_name', 'id');

        $parents = $parentsCollection->pluck('full_name', 'id');

        $programs = SchoolProgram::pluck('program_name', 'id');

        $years = [
            '1' => 'First Year',
            '2' => 'Second Year',
            '3' => 'Third Year',
            '4' => 'Fourth Year'
        ];

        $semesters = TermSemester::pluck('semester_code', 'id');

        return view('student.edit', compact('student', 'programs', 'years', 'semesters', 'parents', 'fathers', 'mothers'));

    }

    function update(Request $request, $id)
    {

        $request->validate([
            'student_id_no' => 'required',
            'program_id' => 'required',
            'semester_id' => 'required',
            'father_id' => 'required',
            'mother_id' => 'required',
            'guardian_id' => 'required',
            'email' => 'required',
        ]);

        $user = auth()->user();

        $student = User::findOrFail($id);

        //todo now send this password to the user by email

        DB::beginTransaction();

        try {

            $address = Address::findOrFail($student->address);

            $address['country'] = request()->input('country');
            $address['state'] = request()->input('state');
            $address['city'] = request()->input('city');
            $address['zip'] = request()->input('zip');
            $address['name'] = request()->input('address');
            $address['street'] = request()->input('street');

            $address->save();


            $student['first_name'] = request()->input('first_name');
            $student['last_name'] = request()->input('last_name');
            $student['middle_name'] = request()->input('middle_name');
            $student['status'] = request()->input('status') == 'active';
            $student['email'] = request()->input('email');
            $student['mobile_phone'] = request()->input("mobile_phone");

            $student->save();

            //now add student information to student registration

            $studentDetail = StudentDetail::where('user_id', '=', $student->id)
                ->firstOrFail();


            $studentDetail['program_id'] = request()->input('program_id');
            $studentDetail['semester'] = request()->input('semester_id');
            $studentDetail['mother_id'] = \request()->input('mother_id');
            $studentDetail['father_id'] = \request()->input('father_id');
            $studentDetail['guardian_id'] = \request()->input('guardian_id');
            $studentDetail['student_id_no'] = \request()->input('student_id_no');

            $studentDetail->save();

            toastr()->success('Student Updated Successfully');

            DB::commit();

            return redirect()->route('students.index');

        } catch (\Exception $exception) {
            toastr()->error($exception->getMessage());
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    function destroy($id)
    {
        $accountHolder = User::findOrFail($id);

        $accountHolder->delete();

        toastr()->success('Deleted');

        return redirect()->route('students.index');

    }
}
