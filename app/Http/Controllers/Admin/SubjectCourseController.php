<?php

namespace App\Http\Controllers\Admin;

use App\Constants\StaticData;
use App\Http\Controllers\BaseController;
use App\Models\AssesmentType;
use App\Models\CourseAssessmentGradeScale;
use App\Models\DeliveryMethod;
use App\Models\Department;
use App\Models\GradeYear;
use App\Models\SchoolProgram;
use App\Models\StudentType;
use App\Models\StudyOption;
use App\Models\Textbook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\Users;
use App\Models\SubjectCourse;
use App\Models\SubjectCourseTextBooks;
use Illuminate\Support\Facades\DB;

class SubjectCourseController extends BaseController
{

    public function index()
    {
        $this->checkPermission('course.view');

        $user = \auth()->user();

        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;

        DB::enableQueryLog();

        $subjectCourseQuery = SubjectCourse::where('school_id', $school_id);


        if ($user->isStudent()) {

            $subjectCourseQuery->whereHas('students', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            });

        }

        if ($user->isTeacher()) {
            $subjectCourseQuery->whereHas('classes', function ($query) use ($user) {
                $query->where('teacher_id', $user->id);
            });
        }


        $SubjectCourse = $subjectCourseQuery->get();


        $school_info = School::where('id', $school_id)->first();

        return view('academical.subject_course.index', compact('school_info', 'SubjectCourse'));
    }

    function show($id)
    {
        $this->checkPermission('course.view');

        $subjectCourse = SubjectCourse::with(['textbooks', 'gradeScales', 'deliveryMethod', 'studyOption', 'studentType', 'tuition'])
            ->findOrFail($id);

        return view('academical.subject_course.show', compact('subjectCourse'));
    }

    public function create()
    {
        $this->checkPermission('course.create');

        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $studentTypes = StudentType::where('status', 1)
            ->pluck('name', 'id');

        $studyOptions = StudyOption::where('status', 1)
            ->pluck('name', 'id');

        $courseFormats = StaticData::getCourseFormats();
        $deliveryMethods = DeliveryMethod::getForDropdown();
        $studentTypes = StudentType::getForDropdown();

        $textbooks = Textbook::getForDropdown();

        $assessmentTypes = AssesmentType::get();

        $gradeScales = StaticData::getGradeScales();

        $courseDurationOptions = StaticData::getCourseDurationOptions();

        return view('academical.subject_course.create', compact('school_info', 'studentTypes', 'studyOptions', 'courseFormats', 'deliveryMethods', 'studentTypes', 'textbooks', 'assessmentTypes', 'gradeScales', 'courseDurationOptions'));
    }

    public function store(Request $request)
    {
        $this->checkPermission('course.create');

        $user = \auth()->user();

        //dd($request->all());

        $request->validate([
            'course_no' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $subjectCourseData = $request->only([
            'course_no', 'title', 'description', 'topics', 'course_format',
            'delivery_method_id', 'study_option_id',
            'requisites', 'requirements', 'learning_outcomes', 'prerequisites',
            'learning_objectives', 'pass_mark', 'maximum_times_to_take',
            'offer_to_id', 'vip_dates', 'tuition_id', 'policy', 'registration_note',
            'important_information', 'status', 'number_of_credits',
        ]);

        $subjectCourseData['credit_accreditable'] = $request->input('credit_accreditable', false);
        $subjectCourseData['credit_transferable'] = $request->input('credit_transferable', false);
        $subjectCourseData['report_progress'] = $request->input('report_progress', false);
        $subjectCourseData['created_by'] = $user->id;
        $subjectCourseData['duration'] = $request->input('duration') . ' ' . $request->input('duration_type');

        $subjectCourseData['school_id'] = $user->school_id;

        DB::beginTransaction();

        try {

            $subjectCourse = SubjectCourse::create($subjectCourseData);

            //save textbook for subject course

            foreach ($request->input('books') as $book) {
                $subjectCourse->textbooks()->attach($book['id'], [
                    'mandatory' => !empty($book['mandatory']),
                ]);
            }

            foreach ($request->gradeScales as $grade) {
                CourseAssessmentGradeScale::create([
                    'course_id' => $subjectCourse->id,
                    'assessment_type_id' => $grade['assessment_type_id'],
                    'grade' => $grade['type'],
                    'description' => $grade['description']
                ]);
            }

            DB::commit();

            return redirect()->route('SubjectCourse.index')
                ->with('success', 'Information added successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors(['message' => $exception->getMessage()]);

        }
    }

    public function edit($id)
    {
        $this->checkPermission('course.edit');

        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school_id;
            $school_info = School::where('id', $school_id)->first();

            $subjectCourse = SubjectCourse::with(['textbooks', 'gradeScales.assessmentType'])
                ->findOrFail($id);

            //dd($subjectCourse);

            $studyOptions = StudyOption::where('status', 1)
                ->pluck('name', 'id');

            $courseFormats = StaticData::getCourseFormats();
            $deliveryMethods = DeliveryMethod::getForDropdown();
            $studentTypes = StudentType::getForDropdown();

            $textbooks = Textbook::getForDropdown();

            $assessmentTypes = AssesmentType::get();

            $gradeScales = StaticData::getGradeScales();

            $courseDurationOptions = StaticData::getCourseDurationOptions();


            return view('academical.subject_course.edit', compact('school_info', 'studyOptions', 'studentTypes', 'subjectCourse', 'textbooks', 'courseDurationOptions', 'gradeScales', 'assessmentTypes', 'courseFormats', 'deliveryMethods', 'studentTypes'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Information not found']);
        }
    }

    public function update(Request $request, $id)
    {

        $this->checkPermission('course.edit');

        $user = \auth()->user();

        $subjectCourse = SubjectCourse::findOrFail($id);

        $request->validate([
            'course_no' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $subjectCourseData = $request->only([
            'course_no', 'title', 'description', 'topics', 'course_format',
            'delivery_method_id', 'study_option_id',
            'requisites', 'requirements', 'learning_outcomes', 'prerequisites',
            'learning_objectives', 'pass_mark', 'maximum_times_to_take',
            'offer_to_id', 'vip_dates', 'tuition_id', 'policy', 'registration_note',
            'important_information', 'status', 'number_of_credits', 'report_progress'
        ]);

        $subjectCourseData['credit_accreditable'] = $request->input('credit_accreditable', false);
        $subjectCourseData['credit_transferable'] = $request->input('credit_transferable', false);
        $subjectCourseData['updated_by'] = $user->id;
        $subjectCourseData['duration'] = $request->input('duration') . ' ' . $request->input('duration_type');


        DB::beginTransaction();

        try {

            $subjectCourse->update($subjectCourseData);

            //save textbook for subject course

            $syncTextbooks = [];

            foreach ($request->input('books') as $book) {
                $syncTextbooks[$book['id']] = ['mandatory' => !empty($book['mandatory'])];
            }

            $subjectCourse->textbooks()->sync($syncTextbooks);

            foreach ($request->gradeScales as $grade) {
                $gradeScale = CourseAssessmentGradeScale::findOrFail($grade['id']);
                $gradeScale['grade'] = $grade['type'];

                $gradeScale['description'] = $grade['description'];
                $gradeScale->save();

            }

            DB::commit();

            return redirect()->route('SubjectCourse.index')
                ->with('success', 'Information added successfully.');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->withErrors(['message' => $exception->getMessage()]);

        }
    }


    public function destroy($id)
    {
        $this->checkPermission('course.delete');

        $color = SubjectCourse::find($id);
        $color->delete();

        return redirect()->route('SubjectCourse.index')
            ->with('success', 'Color delete successfully');
    }

    function addTextbookRow()
    {
        $index = \request()->input('index');
        $id = \request()->input('id', '');
        $textbook = null;
        if ($id) {
            $textbook = Textbook::findOrFail($id);
        }
        $textbooks = Textbook::getForDropdown();

        return view("academical.subject_course.partials.text-book-row", compact('textbooks', 'index', 'textbook', 'id'));
    }

}
