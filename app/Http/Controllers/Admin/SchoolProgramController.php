<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Http\Controllers\BaseController;
use App\Models\Credential;
use App\Models\Date;
use App\Models\DeliveryMethod;
use App\Models\FeeCategory;
use App\Models\ProgramFinancial;
use App\Models\ProgramLength;
use App\Models\Programs;
use App\Models\EducationLevel;
use App\Models\StudentType;
use App\Models\StudyOption;
use App\Models\SubjectCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\Users;
use App\Models\SchoolProgram;
use Illuminate\Support\Facades\Redirect;

class SchoolProgramController extends BaseController
{

    public function index($type)
    {
        $this->checkPermission('program.view');

        $label = '';

        if ($type == 'school-program') {
            $label = "Program";
        }

        if ($type == 'grade-year') {
            $label = "Grade/Year";
        }

        $user = Auth::user();
        $school_id = $user->school_id;
        $schoolProgramQuery = SchoolProgram::with(['schoolLevel', 'credential', 'deliveryMethod'])
            ->where('school_id', $school_id);

        if ($type == 'school-program') {
            $schoolProgramQuery->whereNull('parent_id');
        }

        if ($type == 'grade-year') {
            $schoolProgramQuery->whereNotNull('parent_id');
        }

        $programs = $schoolProgramQuery->get();

        $school_info = School::where('id', $school_id)->first();

        return view('academical.program.index', compact('school_info', 'programs', 'type', 'label'));
    }

    public function create($type)
    {

        $this->checkPermission('program.create');

        $label = '';

        if ($type == 'school-program') {
            $label = "Program";
        }

        if ($type == 'grade-year') {
            $label = "Grade/Year";
        }

        $user_id = Auth::user()->id;

        $school_id = Users::where('id', $user_id)->first()->school_id;

        $school_info = School::where('id', $school_id)->first();

        $schoolLevels = EducationLevel::pluck('name', 'id');

        $credentials = Credential::where('status', 1)->pluck('name', 'id');

        $deliveryMethods = DeliveryMethod::where('status', 1)->pluck('name', 'id');

        //pluck value and key same
        $programLengths = ProgramLength::where('status', 1)->pluck('name', 'name');

        $studentTypes = StudentType::getForDropdown();

        $studyOptions = StudyOption::getForDropdown();

        $subjectCourses = SubjectCourse::getForDropdown();

        $costTypes = FeeCategory::getForDropdown();

        $programs = SchoolProgram::getForDropdown();

        return view('academical.program.create', compact('school_info', 'schoolLevels', 'credentials', 'deliveryMethods', 'programLengths', 'studentTypes', 'studyOptions', 'subjectCourses', 'costTypes', 'type', 'programs', 'label'));
    }

    public function store(Request $request)
    {

        $this->checkPermission('program.create');

        $user = \auth()->user();

        $request->validate([
            'program_code' => 'required',
            'program_name' => 'required|alpha_space',
            'school_level_id' => 'required|numeric',
            'student_type_id' => 'required|numeric',
            'credential_id' => 'required|numeric',
            'delivery_method_id' => 'required|numeric',
        ]);

        $data = $request->only([
            'program_code', 'program_name', 'program_description',
            'school_level_id', 'student_type_id', 'credential_id',
            'delivery_method_id', 'entrance_requirements',
            'semester', 'status',
        ]);

        $type = $request->input('type');

        $data['school_id'] = $user->school_id;

        $data['parent_id'] = $request->input('parent_id', null);

        $data['program_length'] = $request->input('program_length') . ' ' . $request->input('program_length_type');

        DB::beginTransaction();

        try {

            $schoolProgram = SchoolProgram::create($data);

            $courses = $request->input("courses");

            $syncCourseData = [];

            foreach ($courses as $item) {

                $syncCourseData[$item['id']] = [
                    'tuition' => $item['tuition'],
                    'textbooks' => $item['textbooks'],
                    'other_fees' => $item['other_fees'],
                    'total' => $item['total'],
                    'comment' => $item['comment']
                ];
            }

            $schoolProgram->courses()->sync($syncCourseData);

            $syncFeeCategory = [];

            foreach (\request()->input('fee_categories') as $item) {
                $syncFeeCategory[$item['id']] = [
                    'amount' => $item['amount'],
                    'due_date' => $item['due_date'],
                ];
            }

            $schoolProgram->feeCategories()->sync($syncFeeCategory);

            $schoolProgram->dates()->createMany($request->input('events'));

            DB::commit();

            return redirect()->route('SchoolProgram.index', ['type' => $type])
                ->with('success', 'Information added successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->withErrors(['message' => $exception->getMessage()]);
        }
    }

    public
    function show($type, $id)
    {

        $this->checkPermission('program.view');

        $label = '';

        if ($type == 'school-program') {
            $label = "Program";
        }

        if ($type == 'grade-year') {
            $label = "Grade/Year";
        }

        $schoolProgram = SchoolProgram::with(['courses', 'schoolLevel', 'credential', 'deliveryMethod', 'feeCategories', 'dates', 'parent'])->findOrFail($id);

        $type = \request()->input('type');

        if ($type == 'navigator') {
            return view('academical.program.detail', compact('schoolProgram'));
        }

        return view('academical.program.show', compact('schoolProgram', 'label'));
    }

    public
    function edit($type, $id)
    {

        $this->checkPermission('program.edit');

        $user_id = Auth::user()->id;

        $school_id = Users::where('id', $user_id)->first()->school_id;

        $school_info = School::where('id', $school_id)->first();

        $label = '';

        if ($type == 'school-program') {
            $label = "Program";
        }

        if ($type == 'grade-year') {
            $label = "Grade/Year";
        }

        $program = SchoolProgram::with(['courses', 'feeCategories', 'dates'])->where('id', $id)
            ->first();

        $schoolLevels = EducationLevel::pluck('name', 'id');

        $credentials = Credential::where('status', 1)->pluck('name', 'id');

        $deliveryMethods = DeliveryMethod::where('status', 1)->pluck('name', 'id');

        //pluck value and key same
        $programLengths = ProgramLength::where('status', 1)->pluck('name', 'name');

        $studentTypes = StudentType::getForDropdown();

        $studyOptions = StudyOption::getForDropdown();

        $subjectCourses = SubjectCourse::getForDropdown();

        $costTypes = FeeCategory::getForDropdown();

        $programs = SchoolProgram::getForDropdown();

        return view('academical.program.edit', compact('school_info', 'program', 'schoolLevels', 'deliveryMethods', 'programLengths', 'credentials', 'costTypes', 'studentTypes', 'subjectCourses', 'studyOptions', 'school_info', 'programs', 'type', 'label'));

    }

    public
    function update(Request $request, $type, $id)
    {

        $this->checkPermission('program.edit');

        $schoolProgram = SchoolProgram::findOrFail($id);

        $request->validate([
            'program_code' => 'required',
            'program_name' => 'required|alpha_space',
            'school_level_id' => 'required|numeric',
            'student_type_id' => 'required|numeric',
            'credential_id' => 'required|numeric',
            'delivery_method_id' => 'required|numeric',
        ]);

        $data = $request->only([
            'program_code', 'program_name', 'program_description',
            'school_level_id', 'student_type_id', 'credential_id',
            'delivery_method_id', 'entrance_requirements',
            'semester', 'status',
        ]);

        $data['program_length'] = $request->input('program_length') . ' ' . $request->input('program_length_type');

        $data['parent_id'] = $request->input('parent_id', null);

        $schoolProgram->update($data);

        $courses = $request->input("courses");

        $syncCourseData = [];

        foreach ($courses as $item) {

            $syncCourseData[$item['id']] = [
                'tuition' => $item['tuition'],
                'textbooks' => $item['textbooks'],
                'other_fees' => $item['other_fees'],
                'total' => $item['total'],
                'comment' => $item['comment']
            ];
        }

        $schoolProgram->courses()->sync($syncCourseData);

        $syncFeeCategory = [];

        foreach (\request()->input('fee_categories') as $item) {
            $syncFeeCategory[$item['id']] = [
                'amount' => $item['amount'],
                'due_date' => $item['due_date'],
            ];
        }

        $schoolProgram->feeCategories()->sync($syncFeeCategory);
        //remove previous dates
        $schoolProgram->dates()->delete();
        $schoolProgram->dates()->createMany($request->input('events'));

        return redirect()->route('SchoolProgram.index', ['type' => $type])
            ->with('success', 'Information added successfully.');

    }

    public
    function destroy($id)
    {

        $this->checkPermission('program.delete');

        $program = SchoolProgram::find($id);

        //now check it's uses

        $courses = $program->courses;

        if (count($courses) > 0) {
            toastr()->error('Unable to delete. It has some courses');
            return back();
        }

        $type = 'school-program';

        if (!empty($program->type)) {
            $type = 'grade-year';
        }

        $program->delete();

        return redirect()->route('SchoolProgram.index', $type)
            ->with('success', 'Color delete successfully');
    }

    function addCourseRow()
    {
        $index = \request()->input('index');
        $id = \request()->input('id', null);

        $subjectCourse = null;
        if ($id) {
            $subjectCourse = SubjectCourse::findOrFail($id);
        }

        $subjectCourses = SubjectCourse::getForDropdown();

        return view('academical.program.partials.subject-course-row', compact('index', 'subjectCourses', 'subjectCourse'));

    }

    function getGradeYearDropdown()
    {
        $program_id = \request()->input('program');

        $gradeYears = SchoolProgram::where('parent_id', '=', $program_id)
            ->pluck('program_code', 'id');

        return view('academical.program.partials.grade-year-dropdown', compact('gradeYears', 'gradeYears'));

    }

}
