<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Announcement;
use App\Models\Assessment;
use App\Models\AssesmentType;
use App\Models\AssessmentNotification;
use App\Models\AssessmentReminder;
use App\Models\AssessmentStudent;
use App\Models\Assignment;
use App\Models\Department;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\StudentDetail;
use App\Models\TermSemester;
use App\Models\User;
use App\Models\Users;
use App\Models\UserType;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class AssessmentController extends BaseController
{

    private $submissionsTypes = [
        'online' => 'Online',
        'offline' => 'Offline',
    ];

    private $submissionStatuses = [
        'assigned' => 'Assigned',
        'submitted' => 'Submitted',
    ];

    public function index(Request $request)
    {

        $this->checkPermission('assessment.view');

        $type = \request()->query('type');

        $assessmentType = AssesmentType::where('id', $type)
            ->firstOrFail();

        $user = Auth::user();

        if ($request->ajax()) {

            $query = Assessment::query();

            if ($user->isStudent()) {
                $query->whereHas('students', function ($query) use ($user) {
                    $query->where('users.id', $user->id);
                });
            } elseif ($user->isTeacher()) {
                $query->where('created_by', $user->id);
            }

            return DataTables::of($query)
                ->addColumn('action',function ($row){
                    return view('assessment.action-button', compact('row'));
                })
                ->make(true);

        }

        return view('assessment.index', compact('assessmentType'));
    }


    public function create()
    {
        $this->checkPermission('assessment.create');

        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school_id;
        $school_info = School::where('id', $school_id)->first();

        $account_type = UserType::where('status', 1)->orderBy('name', 'ASC')->get();

        $type = \request()->query('type');

        $assessmentType = AssesmentType::where('id', $type)->firstOrFail();

        $classes = SchoolClass::getForDropdown();

        $students = User::getForDropdown('student');

        $academicYears = AcademicYear::getForDropdown();

        $semesters = TermSemester::getForDropdown();

        $userTypes = UserType::getForDropdown();

        //dd($classes->toArray());

        return view('assessment.create', compact('school_info', 'account_type', 'classes', 'students', 'academicYears', 'semesters', 'userTypes', 'assessmentType'))
            ->with(['submissionTypes' => $this->submissionsTypes]);
    }

    function show($id)
    {
        $this->checkPermission('assessment.view');

        $user = \auth()->user();

        $a = Assessment::findByUniqueId($id);

        $assessment = Assessment::with(['type', 'students', 'notifications', 'reminders', 'semester', 'class'])
            ->where('id', '=', $id)
            ->first();

        $submitted = AssessmentStudent::where('student_id', $user->id)
            ->where('assessment_id', $assessment->id)
            ->where('status', 'submitted')
            ->first();

        return view('assessment.view', compact('assessment', 'submitted'))
            ->with(['submissionStatuses' => $this->submissionStatuses]);
    }

    public function store(Request $request)
    {

        $this->checkPermission('assessment.create');

        $request->validate([
            'academic_year_id' => 'required|numeric',
            'semester_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'title' => 'required',
            'mark' => 'required|numeric',
            'submission_due_date' => 'required|date',
            'submission_type' => 'required',

        ]);

        $user = \auth()->user();

        // dd(\request()->all());

        $assessmentData = $request->only([
            'submission_due_date', 'mark', 'title',
            'instruction', 'academic_year_id', 'term_id', 'semester_id',
            'class_id', 'submission_type', 'late_submission_policy',
            'extended_due_date'
        ]);

        $assessmentData['assessment_type_id'] = $request->type;

        $assessmentData['created_by'] = $user->id;

        $assessmentData['posted_date'] = now();

        $classId = $request->input('class_id');

        $class = SchoolClass::findOrFail($classId);

        $students = $class->getStudents();

        $assessmentData['course_id'] = $class->subject_course_id;

        /*if (count($students) == 0) {
            toastr()->error('This class doesn\'t have any students', 'Failed');
            return back()->withErrors(['message' => 'This class doesn\'t have any students']);
        }*/

        $assessmentData['school_id'] = $user->school_id;

        DB::beginTransaction();

        try {

            $attachments = (new FileService())->upload($request, $user);

            $assessment = Assessment::create($assessmentData);

            $assessment->attachments()->sync($attachments);

            //add students assessment table

            $studentIds = $students->pluck('id');

            $assessment->students()->attach($studentIds);

            //add notification type

            //$notificationsFor = \request()->notifications_for;

            //dd($notificationsFor);

            /*if (!empty($notificationsFor)) {
                foreach ($notificationsFor as $notification) {
                    //dd($notification);
                    AssessmentNotification::create([
                        'assessment_id' => $assessment->id,
                        'user_type_id' => $notification,
                    ]);
                }
            }

            $reminders = $request->reminders;

            if (!empty($reminders)) {
                foreach ($reminders as $reminder) {
                    AssessmentReminder::create([
                        'assessment_id' => $assessment->id,
                        'date' => $reminder['date'],
                    ]);
                }
            }*/

            DB::commit();

            toastr()->success(__('assessment-added'));

            return redirect()->route('assessments.index', ['type' => $request->type])
                ->with('success', 'Information added successfully.');


        } catch (\Exception $exception) {
            DB::rollBack();
            return \redirect()->back()->withErrors($exception->getMessage());
        }

    }

    public function edit($id)
    {

        $this->checkPermission('assessment.edit');

        $assessment = Assessment::with(['type', 'students', 'notifications', 'attachments'])
            ->where('unique_id', '=', $id)
            ->first();

        $notificationsFor = $assessment->notifications->pluck('id', 'name');

        //return $notificationsFor;

        $classes = SchoolClass::getForDropdown();

        //$students = StudentDetail::select('id', 'first_name as name')->get();

        $academicYears = AcademicYear::getForDropdown();

        $semesters = TermSemester::getForDropdown();

        $userTypes = UserType::all();

        $type = AssesmentType::findOrFail($assessment->assessment_type_id);

        return view('assessment.edit', compact('assessment', 'classes', 'userTypes', 'academicYears', 'semesters', 'notificationsFor', 'type'))
            ->with(['submissionTypes' => $this->submissionsTypes]);

    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'academic_year_id' => 'required|numeric',
            'semester_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'title' => 'required',
            'mark' => 'required|numeric',
            'submission_due_date' => 'required|date',
            'submission_type' => 'required',

        ]);

        $this->checkPermission('assessment.edit');

        $user = \auth()->user();


        $assessmentData = $request->only([
            'submission_due_date', 'mark', 'title',
            'instruction', 'academic_year_id', 'term_id', 'semester_id',
            'class_id', 'submission_type', 'late_submission_policy',
            'extended_due_date'
        ]);

        $assessment = Assessment::findOrFailByUniqueId($id);

        //DB::beginTransaction();

        try {

            $attachments = (new FileService())->upload($request, $user);

            $existing_files = $request->input('existing_attachments', []);

            $attachments = array_merge($attachments, $existing_files);

            $assessment->update($assessmentData);

            $assessment->attachments()->sync($attachments);


            /*            //add students assessment table

                        $students = $request->students;

                        if (!empty($students)) {
                            foreach ($students as $student) {
                                AssessmentStudent::create([
                                    'assessment_id' => $assessment->id,
                                    'student_id' => $student,
                                ]);
                            }
                        }

                        //add notification type

                        $notificationsFor = \request()->notifications_for;

                        //dd($notificationsFor);

                        if (!empty($notificationsFor)) {
                            foreach ($notificationsFor as $notification) {
                                //dd($notification);
                                AssessmentNotification::create([
                                    'assessment_id' => $assessment->id,
                                    'user_type_id' => $notification,
                                ]);
                            }
                        }

                        $reminders = $request->reminders;

                        if (!empty($reminders)) {
                            foreach ($reminders as $reminder) {
                                AssessmentReminder::create([
                                    'assessment_id' => $assessment->id,
                                    'date' => $reminder['date'],
                                ]);
                            }
                        }*/


            toastr()->success('updated');

            DB::commit();

            return redirect()->route('assessments.index', ['type' => $assessment->assessment_type_id])
                ->with('success', 'Information added successfully.');


        } catch (\Exception $exception) {
            DB::rollBack();
            return \redirect()->back()->withErrors($exception->getMessage());
        }
    }


    public function destroy($id)
    {

        $this->checkPermission('assessment.delete');

        $assessment = Assessment::findOrFailByUniqueId($id);
        $assessment->delete();

        toastr()->success('Deleted');

        return response()->json(['status' => 'success', 'message' => __('item-deleted-successfully')]);
    }

    function submit($id)
    {


        $user = \auth()->user();

        $assessment = Assessment::findOrFail($id);

        if (!$user->isStudent()) {
            toastr()->error('Only students are allowed to submit');
            return \redirect()->back()->withErrors(['message' => 'Only students are allowed to submit']);
        }

        //submit

        $studentAssignment = AssessmentStudent::where('student_id', $user->id)
            ->where('assessment_id', $assessment->id)
            ->first();

        $studentAssignment->submitted_at = now();
        $studentAssignment->status = 'submitted';
        $studentAssignment->save();

        toastr()->success('Assessment Submitted');
        return \redirect()->route("assessments.show", $id);
    }

}
