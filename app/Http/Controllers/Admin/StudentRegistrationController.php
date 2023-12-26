<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Models\AcademicYear;
use App\Models\Address;
use App\Models\Car;
use App\Models\Contact;
use App\Models\FeesAndCharges;
use App\Models\SchoolProgram;
use App\Models\Section;
use App\Models\StudentType;
use App\Models\SubjectCourse;
use App\Models\TermSemester;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Users;
use App\Models\StudentDetail;
use App\Models\UserType;
use Yajra\DataTables\DataTables;

class StudentRegistrationController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;

        if(\request()->ajax()){
            $users = User::with(['detail.program', 'detail.gradeYear'])->whereUserType('student');

            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    return "<a href='students-hub/$row->id' class='btn btn-primary'>View</a>";
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        $school_info = School::where('id', $school_id)->first();

        return view('student_registration.index', compact('school_info', ));
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();
        $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();

        $genders = User::getGenders();

        $academicYears = AcademicYear::getForDropdown();

        $programs = SchoolProgram::getForDropdown();

        $semesters = TermSemester::getForDropdown();

        $religions = StaticData::getReligions();

        $courses = SubjectCourse::whereActive()
            ->get();

        $parents = User::whereUserType('parent')->get();

        $mothers = $parents->where('gender', 'female')->pluck('full_name', 'id');

        $fathers = $parents->where('gender', 'male')->pluck('full_name', 'id');

        $sections = Section::getForDropdown();

        $bloodGroups = StaticData::getBloodGroups();

        $studentTypes = StudentType::getForDropdown();

        $caseManagers = User::getForDropdown('case-manager');

        $guardians = User::getForDropdown('guardian');

        $feeAndCharges = FeesAndCharges::getForDropdown();

        //dd($caseManagers);

        return view('student_registration.create', compact('school_info', 'account_type', 'genders', 'academicYears', 'programs', 'semesters', 'semesters', 'courses', 'fathers', 'mothers', 'sections', 'religions', 'bloodGroups', 'studentTypes', 'caseManagers', 'guardians', 'feeAndCharges'));
    }

    public function store(Request $request)
    {

        //dd($request->all());

        $user = \auth()->user();

        $school = $user->school;

        $request->validate([
            'student_id_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',

            'father_id' => 'required',
            'mother_id' => 'required',

            'nationality' => 'required',
            'born_in_country' => 'required',
            'student_type_id' => 'required',
            'emergency_contact_name' => 'required',
            'emergency_contact_relation' => 'required',
            'emergency_contact_phone' => 'required',
            'emergency_contact_address' => 'required',

            'academic_year_id' => 'required',
            'program_id' => 'required',
            'grade_year_id' => 'nullable|numeric',

            //address
           /* 'country_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',*/
            'zip_code' => 'required',
            'street' => 'required',
            'address_line' => 'required',
        ]);

        $userType = UserType::findBySlug('student');

        //add address

        DB::beginTransaction();

        $password = "123456";

        try {

            $address = Address::create([
                'name' => $request->input('address_line'),
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street,
                'zip' => $request->zip_code,
            ]);

            $emergencyContact = Contact::create([
                'name' => $request->input("emergency_contact_name"),
                'relation' => $request->input("emergency_contact_relation"),
                'address' => $request->input("emergency_contact_address"),
                'phone' => $request->input("emergency_contact_phone"),
                'school_id' => $school->id,
            ]);

            $familyDoctor = Contact::create([
                'name' => $request->input('doctor_name'),
                'address' => $request->input('doctor_address'),
                'phone' => $request->input('doctor_phone'),
                'school_id' => $school->id,
            ]);

            //car


            $car = Car::create([
                'name' => $request->input('car_name'),
                'model' => $request->input('car_model'),
                'color' => $request->input('car_color'),
                'plate_no' => $request->input('car_plate_no'),
                'policy_no' => $request->input('car_policy_no'),
                'expiry_date' => $request->input('car_expiry_date'),
            ]);

            //Student Photo

            $imageAttachment = (new FileService())->upload($request, $user, 'student_photo', ['mode' => 'single']);

            $documents = (new FileService())->upload($request, $user);

            $student = User::create([
                'school_id' => $school->id,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'address_id' => $address->id,
                'mobile_phone' => $request->phone,
                'email' => $request->email,
                'user_type' => $userType->id,
                'status' => $request->status,
                'password' => bcrypt($password),
                'image_path' => $imageAttachment ? $imageAttachment->file_path : null,
                'emergency_contact_id' => $emergencyContact->id,
                'doctor_id' => $familyDoctor->id,
                'case_manager_id' => $request->input('case_manager_id'),
                'awards_and_achievements' => $request->input('awards_and_achievements'),
                'parking_stall_no' => $request->input('parking_stall_no'),
                'car_id' => $car->id,
                'locker_no' => $request->input('locker_no'),
                'volunteer_activities' => $request->input('volunteer_activities'),
                'bike_info' => $request->input('bike_info'),
                'feedback' => $request->input('feedback'),
                'comment' => $request->input('comment'),
                'nationality' => $request->input('nationality'),
                'born_in_country' => $request->input('born_in_country'),
                'languages_spoken' => $request->input('languages_spoken'),
                'citizenship_status' => $request->input('citizenship_status'),
                'dob' => $request->input('dob'),
            ]);

            //guardian id

            $whoIsGuardian = $request->input('who_is_guardian', null);
            $guardian_id = null;
            if (!empty($whoIsGuardian)) {
                if ($whoIsGuardian == 'other') {
                    $guardian_id = $request->input('guardian_id');
                } else if ($whoIsGuardian == 'father') {
                    $guardian_id = $request->input('father_id');
                } else if ($whoIsGuardian == 'mother') {
                    $guardian_id = $request->input('mother_id');
                }
            }

            $studentDetail = StudentDetail::create([
                'school_id' => $user->school_id,
                'user_id' => $student->id,
                'father_id' => $request->input('father_id'),
                'mother_id' => $request->input('mother_id'),
                'guardian_id' => $guardian_id,
                'program_id' => $request->input('program_id'),
                'academic_year_id' => $request->academic_year_id,
                'semester_id' => $request->semester_id,
                'section_id' => $request->section_id,
                'student_id_no' => $request->student_id_no,
                'grade_year_id' => $request->input('grade_year_id'),
                'dob' => $request->input('dob'),
                'religion' => $request->input('religion'),
                'emergency_contact_name' => $request->input('emergency_contact_name'),
                'emergency_contact_gender' => $request->input('emergency_contact_gender'),
                'emergency_contact_phone' => $request->input('emergency_contact_phone'),
                'emergency_contact_relation' => $request->input('emergency_contact_relation'),
                'emergency_contact_address' => $request->input('emergency_contact_address'),
                'has_medical_condition' => $request->input('has_medical_condition'),
                'medical_description' => $request->input('medial_description'),
                'has_special_needs' => $request->input('has_special_needs'),
                'special_needs_description' => $request->input('special_needs_description'),
                'blood_group' => $request->input('blood_group'),
                'special_services' => $request->input('special_services'),
                'transportation_information' => $request->input('transportation_information'),
                'student_type_id' => $request->input('student_type_id'),
            ]);

            //now add courses

            $courses = $request->courses;

            $student->courses()->sync($courses);

            $student->attachments()->sync($documents);

            //family members

            $members = count($request->input('members', []));

            for ($i = 0; $i < $members; $i++) {
                Contact::create([
                    'name' => $request->input('family_member_name')[$i],
                    'relation' => $request->input('family_member_relation')[$i],
                    'phone' => $request->input('family_member_phone')[$i],
                    'address' => $request->input('family_member_address')[$i],
                    'user_id' => $student->id,
                    'type' => 'family_member',
                    'school_id' => $school->id
                ]);
            }


            /*FinancialInStudentRegistration::create([
                'cost_type_id' => $request->cost_type_id,
                'amount' => $request->amount,
                'due_date' => $request->due_date,
                'student_registration_id' => $student_registration->id,
                'status' => $request->status,
            ]);

            MyPaymentInStudentRegistration::create([
                'total_payable' => $request->total_payable,
                'payment_method' => $request->payment_method,
                'money_order' => $request->money_order,
                'student_registration_id' => $student_registration->id,
                'status' => $request->status,
            ]);*/

            DB::commit();

            return redirect()->route('StudentRegistration.index')
                ->with('success', 'Information added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function edit(Request $request, $id)
    {


        $user = \auth()->user();

        $student = User::with(['car', 'doctor', 'add', 'emergencyContact', 'members'])->findOrFail($id);

        $studentDetail = StudentDetail::where('user_id', $student->id)
            ->first();

        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();
        $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();

        $genders = User::getGenders();

        $academicYears = AcademicYear::getForDropdown();

        $programs = SchoolProgram::getForDropdown();

        $semesters = TermSemester::getForDropdown();

        $religions = StaticData::getReligions();

        $courses = SubjectCourse::whereActive()
            ->get();

        $parents = User::whereUserType('parent')->get();

        $mothers = $parents->where('gender', 'female')->pluck('full_name', 'id');

        $fathers = $parents->where('gender', 'male')->pluck('full_name', 'id');

        $sections = Section::getForDropdown();

        $bloodGroups = StaticData::getBloodGroups();

        $studentTypes = StudentType::getForDropdown();

        $caseManagers = User::getForDropdown('case-manager');

        $guardians = User::getForDropdown('guardian');

        $gradeYears = SchoolProgram::where('parent_id', $studentDetail->program_id)
            ->pluck('program_name', 'id');


        return view('student_registration.edit', compact('student', 'studentDetail', 'programs', 'fathers', 'mothers', 'caseManagers', 'academicYears', 'guardians', 'sections', 'courses', 'genders', 'studentTypes', 'semesters', 'gradeYears'));


    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'student_id_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'father_id' => 'required',
            'mother_id' => 'required',
            'nationality' => 'required',
            'born_in_country' => 'required',
            'student_type_id' => 'required',
            'emergency_contact_name' => 'required',
            'emergency_contact_relation' => 'required',
            'emergency_contact_phone' => 'required',
            'emergency_contact_address' => 'required',

            'academic_year_id' => 'required',
            'program_id' => 'required',
            //'grade_year_id' => 'required',

            //address
            'country_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'address_line' => 'required',

        ]);


        $user = \auth()->user();

        $school = $user->school;

        DB::beginTransaction();

        try {

            $address = Address::find($request->input('address_id'));

            $address->update([
                'name' => $request->input('address_line'),
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'street' => $request->street,
                'zip' => $request->zip_code,
            ]);

            $emergencyContact = Contact::find($request->input('emergency_contact_id'));

            $emergencyContact->update([
                'name' => $request->input("emergency_contact_name"),
                'relation' => $request->input("emergency_contact_relation"),
                'address' => $request->input("emergency_contact_address"),
                'phone' => $request->input("emergency_contact_phone"),
                'school_id' => $school->id,
            ]);

            $familyDoctor = Contact::find($request->input('doctor_id'));

            $familyDoctor->update([
                'name' => $request->input('doctor_name'),
                'address' => $request->input('doctor_address'),
                'phone' => $request->input('doctor_phone'),
                'school_id' => $school->id,
            ]);

            //car

            $car = Car::find($request->input('car_id'));

            $car->update([
                'name' => $request->input('car_name'),
                'model' => $request->input('car_model'),
                'color' => $request->input('car_color'),
                'plate_no' => $request->input('car_plate_no'),
                'policy_no' => $request->input('car_policy_no'),
                'expiry_date' => $request->input('car_expiry_date'),
            ]);

            //Student Photo

            $imageAttachment = (new FileService())->upload($request, $user, 'student_photo', ['mode' => 'single']);

            $documents = (new FileService())->upload($request, $user);

            $student = User::findOrFail($id);

            $student->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'address_id' => $address->id,
                'mobile_phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'image_path' => $imageAttachment ? $imageAttachment->file_path : null,
                'emergency_contact_id' => $emergencyContact->id,
                'doctor_id' => $familyDoctor->id,
                'case_manager_id' => $request->input('case_manager_id'),
                'awards_and_achievements' => $request->input('awards_and_achievements'),
                'parking_stall_no' => $request->input('parking_stall_no'),
                'car_id' => $car->id,
                'locker_no' => $request->input('locker_no'),
                'volunteer_activities' => $request->input('volunteer_activities'),
                'bike_info' => $request->input('bike_info'),
                'feedback' => $request->input('feedback'),
                'comment' => $request->input('comment'),
                'nationality' => $request->input('nationality'),
                'born_in_country' => $request->input('born_in_country'),
                'languages_spoken' => $request->input('languages_spoken'),
                'citizenship_status' => $request->input('citizenship_status'),
                'dob' => $request->input('dob'),
            ]);

            //guardian id

            $whoIsGuardian = $request->input('who_is_guardian', null);

            $guardian_id = null;

            if (!empty($whoIsGuardian)) {
                if ($whoIsGuardian == 'other') {
                    $guardian_id = $request->input('guardian_id');
                } else if ($whoIsGuardian == 'father') {
                    $guardian_id = $request->input('father_id');
                } else if ($whoIsGuardian == 'mother') {
                    $guardian_id = $request->input('mother_id');
                }
            }

            $studentDetail = StudentDetail::findOrFail($request->input('student_detail_id'));

            $studentDetail->update([
                'father_id' => $request->input('father_id'),
                'mother_id' => $request->input('mother_id'),
                'guardian_id' => $guardian_id,
                'program_id' => $request->input('program_id'),
                'student_type_id' => $request->student_type_id,
                'academic_year_id' => $request->academic_year_id,
                'semester_id' => $request->semester_id,
                'section_id' => $request->section_id,
                'student_id_no' => $request->student_id_no,
                'grade_year_id' => $request->input('grade_year_id'),
                'religion' => $request->input('religion'),
                'emergency_contact_name' => $request->input('emergency_contact_name'),
                'emergency_contact_gender' => $request->input('emergency_contact_gender'),
                'emergency_contact_phone' => $request->input('emergency_contact_phone'),
                'emergency_contact_relation' => $request->input('emergency_contact_relation'),
                'emergency_contact_address' => $request->input('emergency_contact_address'),
                'has_medical_condition' => $request->input('has_medical_condition'),
                'medical_description' => $request->input('medial_description'),
                'has_special_needs' => $request->input('has_special_needs'),
                'special_needs_description' => $request->input('special_needs_description'),
                'blood_group' => $request->input('blood_group'),
                'special_services' => $request->input('special_services'),
                'transportation_information' => $request->input('transportation_information'),
            ]);

            //now add courses

            $courses = $request->courses;

            $student->courses()->sync($courses);

            $student->attachments()->sync($documents);

            //family members

            //remove previous memebers

            $student->members()->delete();

            $members = count($request->input('members', []));

            for ($i = 0; $i < $members; $i++) {
                Contact::create([
                    'name' => $request->input('family_member_name')[$i],
                    'relation' => $request->input('family_member_relation')[$i],
                    'phone' => $request->input('family_member_phone')[$i],
                    'address' => $request->input('family_member_address')[$i],
                    'user_id' => $student->id,
                    'type' => 'family_member',
                    'school_id' => $school->id
                ]);
            }

            DB::commit();


            return redirect()->route('StudentRegistration.index')
                ->with('success', 'Information successfully updated.');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $color = StudentDetail::find($id);
        $color->delete();

        return redirect()->route('student_registration.index')
            ->with('success', 'Color delete successfully');
    }

    function getAdmissions()
    {
        if (\request()->ajax()) {
            $studentQuery = StudentDetail::with(['user', 'program', 'gradeYear'])
                ->orderBy('created_at', 'desc');

            $program = \request()->input('program_id', null);
            $gradeYear = \request()->input('grade_year_id', null);
            $course = \request()->input('course_id', null);

            if (!empty($program)) {
                $studentQuery->where('program_id', $program);
            }

            if (!empty($gradeYear)) {
                $studentQuery->where('grade_year_id', $gradeYear);
            }

            if(!empty($course)){
                $studentQuery->whereHas('courses', function ($query)use($course){
                    $query->where('subject_course.id', $course);
                });
            }

            return DataTables::of($studentQuery)
                ->addColumn('action', function ($row) {
                    return view('admission.action-buttons', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $programs = SchoolProgram::getForDropdown();

        $courses = SubjectCourse::getForDropdown();

        return view('admission.index', compact('programs', 'courses'));
    }

    public function getUsers(Request $request)
    {
        $studentId = DB::table("student_details")->where("user_id", $request->id)->pluck("student_id_no", "id");
        return json_encode($studentId);
//        $html = '<option value="">---Select----</option>';
//        if ($request->student_details) {
//            $user_data = Users::where('user_type', $request->student_details)->orderBy('user_name', 'ASC')->get();
//        }
//        if (isset($user_data) && !empty($user_data)) {
//            foreach ($user_data as $row => $val) {
//                $html .= '<option value="' . $val->id . '">' . $val->user_name . '</option>';
//            }
//        }
//        echo $html;
    }

    public function details($id)
    {
        $course_out = StudentDetail::where('id', $id)->first();
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '</thead>';

        $html .= '<tbody>';

        $html .= '<tr><th scope="row">School:</th>';
        $html .= '<td>' . $school_info->name . '</td></tr>';

        $html .= '<tr><th scope="row">Student ID No:</th>';
        $html .= '<td>' . $course_out->student_id_no . '</td></tr>';

        $html .= '<tr><th scope="row">First Name :</th>';
        $html .= '<td>' . $course_out->first_name . '</td></tr>';

        $html .= '<tr><th scope="row">Middle Name :</th>';
        $html .= '<td>' . $course_out->middle_name . '</td></tr>';

        $html .= '<tr><th scope="row">Last Name :</th>';
        $html .= '<td>' . $course_out->last_name . '</td></tr>';

        $html .= '<tr><th scope="row">Gender :</th>';
        $html .= '<td>' . $course_out->gender . '</td></tr>';

        $address = \App\Models\Address::where('id', $course_out->address)->first();
        $html .= '<tr><th scope="row"><h3>Address</h3></th>';
        if (isset($address) && !empty($address)) {
            $html .= '<tr><th scope="row">Number:</th>';
            $html .= '<td>' . $address->name . '</td></tr>';
            $html .= '<tr><th scope="row">Street:</th>';
            $html .= '<td>' . $address->street . '</td></tr>';
            $html .= '<tr><th scope="row">City:</th>';
            $html .= '<td>' . $address->city . '</td></tr>';
            $html .= '<tr><th scope="row">Zip/Postal Code :</th>';
            $html .= '<td>' . $address->zip . '</td></tr>';
            $html .= '<tr><th scope="row">State/ Province:</th>';
            $html .= '<td>' . $address->state . '</td></tr>';
            $html .= '<tr><th scope="row">Country:</th>';
            $html .= '<td>' . $address->country . '</td></tr>';
        } else {
            $html .= '<td>' . ',' . '</td></tr>';
        }

        $html .= '<tr><th scope="row"><h3>Contact</h3></th>';
        $html .= '<tr><th scope="row">Office Phone :</th>';
        $html .= '<td>' . $course_out->phone_office . '</td></tr>';

        $html .= '<tr><th scope="row">Email :</th>';
        $html .= '<td>' . $course_out->email . '</td></tr>';

        $html .= '<tr><th scope="row">Fax No. :</th>';
        $html .= '<td>' . $course_out->fax . '</td></tr>';

        $students_category = 'Domestic';
        if ($course_out->students_category == 2) {
            $students_category = 'International';
        }
        $html .= '<tr><th scope="row">Student Category :</th>';
        $html .= '<td>' . $students_category . '</td></tr>';

        $html .= '<tr><th scope="row">Academic Year :</th>';
        $html .= '<td>' . $course_out->academic_year . '</td></tr>';

        $term = \App\Models\SchoolProgram::where('id', $course_out->term)->first();
        $html .= '<tr><th scope="row">Term Name:</th>';
        $html .= '<td>' . $term->term . '</td></tr>';

        $html .= '<tr><th scope="row">Start :</th>';
        $html .= '<td>' . $course_out->term_start . '</td></tr>';

        $html .= '<tr><th scope="row">End :</th>';
        $html .= '<td>' . $course_out->term_end . '</td></tr>';

        $html .= '<tr><th scope="row">Duration :</th>';
        $html .= '<td>' . $course_out->term_duration . '</td></tr>';

        $semester = \App\Models\SchoolProgram::where('id', $course_out->semester)->first();
        $html .= '<tr><th scope="row">Semester Name:</th>';
        $html .= '<td>' . $semester->semester . '</td></tr>';

        $html .= '<tr><th scope="row">Start :</th>';
        $html .= '<td>' . $course_out->semester_start . '</td></tr>';

        $html .= '<tr><th scope="row">End :</th>';
        $html .= '<td>' . $course_out->semester_end . '</td></tr>';

        $html .= '<tr><th scope="row">Duration :</th>';
        $html .= '<td>' . $course_out->semester_duration . '</td></tr>';

//        ========================= Subject/Course ==========================
        $html .= '<tr><th scope="row"><h3>Subject-Course</h3></th>';
        $subject_course = \App\Models\StudentCourse::where('id', $course_out->subject_course_in_student_registration)->first();
        $sub_cou = \App\Models\SubjectCourse::where('id', $subject_course->course_no)->first();
        $html .= '<tr><th scope="row">Course No:</th>';
        $html .= '<td>' . $sub_cou->crn_no . '</td></tr>';

        $html .= '<tr><th scope="row">Course Name:</th>';
        $html .= '<td>' . $sub_cou->crn_name . '</td></tr>';

        $sub_cou_availability = 'Yes';
        if ($subject_course->sub_cou_availability == 2) {
            $sub_cou_availability = 'No';
        }
        $html .= '<tr><th scope="row">Availability :</th>';
        $html .= '<td>' . $sub_cou_availability . '</td></tr>';

        $html .= '<tr><th scope="row">Start:</th>';
        $html .= '<td>' . $subject_course->sub_cou_start . '</td></tr>';

        $html .= '<tr><th scope="row">End:</th>';
        $html .= '<td>' . $subject_course->sub_cou_end . '</td></tr>';

        $html .= '<tr><th scope="row">Duration:</th>';
        $html .= '<td>' . $subject_course->sub_cou_duration . '</td></tr>';

        $study_choice = 'Full Time';
        if ($subject_course->study_choice == 2) {
            $study_choice = 'Part Time';
        }
        $html .= '<tr><th scope="row">Study Choice :</th>';
        $html .= '<td>' . $study_choice . '</td></tr>';

        $html .= '<tr><th scope="row">Delivery Method:</th>';
        $html .= '<td>' . $subject_course->delivery_method . '</td></tr>';

        $html .= '<tr><th scope="row">Number of Classes:</th>';
        $html .= '<td>' . $subject_course->number_of_classes . '</td></tr>';

        $classroom = \App\Models\Classroom::where('id', $subject_course->classroom_no)->first();
        $html .= '<tr><th scope="row">Classroom No:</th>';
        $html .= '<td>' . $classroom->classroom_no . '</td></tr>';

        //        ========================= Program ==========================
        $html .= '<tr><th scope="row"><h3>Program</h3></th>';
        $program = \App\Models\ProgramInStudentRegistration::where('id', $course_out->program_in_student_registration)->first();
        $program_name = \App\Models\Programs::where('id', $program->program_name)->first();
        $html .= '<tr><th scope="row">Program Name:</th>';
        $html .= '<td>' . $program_name->name . '</td></tr>';

        $program_availability = 'Yes';
        if ($program->program_availability == 2) {
            $program_availability = 'No';
        }
        $html .= '<tr><th scope="row">Availability :</th>';
        $html .= '<td>' . $program_availability . '</td></tr>';

        $html .= '<tr><th scope="row">Start:</th>';
        $html .= '<td>' . $program->program_start . '</td></tr>';

        $html .= '<tr><th scope="row">End:</th>';
        $html .= '<td>' . $program->program_end . '</td></tr>';

        $html .= '<tr><th scope="row">Duration:</th>';
        $html .= '<td>' . $program->program_duration . '</td></tr>';

        $html .= '<tr><th scope="row">Number of Courses:</th>';
        $html .= '<td>' . $program->number_of_courses . '</td></tr>';

        //        ======================= Financial ====================
        $html .= '<tr><th scope="row"><h3>Financial</h3></th>';
        $financial = \App\Models\FinancialInStudentRegistration::where('id', $course_out->financial_in_student_registration)->first();
        $finan = \App\Models\CostType::where('id', $financial->cost_type)->first();
        $html .= '<tr><th scope="row">Cost Type:</th>';
        $html .= '<td>' . $finan->name . '</td></tr>';

        $html .= '<tr><th scope="row">Amount:</th>';
        $html .= '<td>' . $financial->amount . '</td></tr>';

        $html .= '<tr><th scope="row">Due Date:</th>';
        $html .= '<td>' . $financial->due_date . '</td></tr>';

        //        ======================= My Payment ====================
        $html .= '<tr><th scope="row"><h3>My Payment</h3></th>';
        $my_payment = \App\Models\MyPaymentInStudentRegistration::where('id', $course_out->my_payment_in_student_registration)->first();
        $html .= '<tr><th scope="row">Total Payable:</th>';
        $html .= '<td>' . $my_payment->total_payable . '</td></tr>';

        $html .= '<tr><th scope="row">Payment Method:</th>';
        $html .= '<td>' . $my_payment->payment_method . '</td></tr>';

        $html .= '<tr><th scope="row">Money Order:</th>';
        $html .= '<td>' . $my_payment->money_order . '</td></tr>';

        $status = 'In-Active';
        if ($course_out->status == 1) {
            $status = 'Active';
        }
        $html .= '<tr><th scope="row">Status:</th>';
        $html .= '<td>' . $status . '</td></tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    function reviewApplication($id)
    {
        $student = User::with(['detail', 'detail.father', 'detail.mother'])->findOrFail($id);

        $admissionStatuses = StaticData::getAdmissionsStatuses();

        return view('admission.review-application', compact('student', 'admissionStatuses'));
    }

    function postReviewApplication($id)
    {
        \request()->validate([
            'status' => 'required'
        ]);

        $student = User::findOrFail($id);

        $student->detail()->update([
            'application_status' => \request()->input('status'),
            'application_remarks' => \request()->input('remarks'),
        ]);

        return redirect()->route("admission-and-registration");

    }

    function registrationStatus()
    {

        $programsDropdown = SchoolProgram::getForDropdown();

        $gradeYearsDropdown = SchoolProgram::getGradeYearForDropdown();

        $programId = \request()->input('program_id', null);
        $gradeYearId = \request()->input('grade_year_id', null);
        $courseId = \request()->input('course_id', null);

        $programQuery = SchoolProgram::withCount('students');

        if (!empty($programId)) {
            $programQuery->where('id', $programId);
        }
        $programs = $programQuery->get();

        $gradeYearQuery = SchoolProgram::withCount('gradeYearStudents');

        if (!empty($gradeYearId)) {
            $gradeYearQuery->where('id', $gradeYearId);
        }

        $gradeYears = $gradeYearQuery->get();

        $courseQuery = SubjectCourse::withCount('students');

        if (!empty($courseId)) {
            $courseQuery->where('id', $courseId);
        }

        $courses = $courseQuery->get();

        $coursesDropdown = SubjectCourse::getForDropdown();

        return view("admission.status", compact('programsDropdown', 'gradeYearsDropdown', 'gradeYears', 'programs', 'courses', 'coursesDropdown', 'programsDropdown'));

    }
}
