@extends('layouts.master')

@push('css')
    <style>
        .user-photo-container {
            overflow: hidden;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .user-photo-container img {
            width: 100%;
            aspect-ratio: 1;
        }

        .list-table th {
            width: 40%
        }

        .list-table td {
            width: 60%
        }

    </style>
@endpush

@section('content')

    <x-content>
        <x-slot name="header">
            <h4>{{__('student-profile')}}</h4>
            <a class="btn btn-primary" href="{{route('StudentRegistration.edit', $student->id)}}">{{__('upate-information')}}</a>
        </x-slot>

        <div class="row">

            <div class="col-sm-4">
                <div class="user-photo-container">
                    <img src="{{$student->image_url}}"
                    />
                </div>
            </div>
            <div class="offset-8"></div>

            <div class="col-12">

                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('student-id')}}</th>
                        <td>{{$student->detail->student_id_no}}</td>
                    </tr>
                    <tr>
                        <th>{{__('status')}}</th>
                        <td>{{$student->status ? 'Active' : "Inactive"}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4 class="text-center">{{__('personal-information')}}</h4>
            </div>

            <div class="col-12 my-2">

                <table class="table table-bordered list-table">

                    <tr>
                        <th>{{__('full-name')}}</th>
                        <td>
                            {{$student->full_name ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <th>{{__('date-of-birth')}}</th>
                        <td>
                            {{$student->detail->dob ?? ''}}
                        </td>
                    </tr>

                    <tr>
                        <th>{{__('gender')}}</th>
                        <td>
                            {{$student->gender ?? ''}}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('address')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('country')}}</th>
                        <td>{{$student->add->country ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('state')}}</th>
                        <td>{{$student->add->state ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('city')}}</th>
                        <td>{{$student->add->city ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__("address")}}</th>
                        <td>{{$student->add->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('zip-code')}}</th>
                        <td>{{$student->add->zip ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('contact')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('email')}}</th>
                        <td>{{$student->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('email')}}</th>
                        <td>{{$student->mobile_phone ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('demographic-information')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('nationality')}}</th>
                        <td>{{$student->nationality ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('born-in-country')}}</th>
                        <td>{{$student->born_in_country ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>
                            {{__('languages_spoken')}}
                        </th>
                        <td>{{$student->languages_spoken ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>
                            {{__('citizenship-status')}}
                        </th>
                        <td>
                            {{$student->citizenship_status ?? ''}}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12">

                <table class="table table-bordered list-table">

                    <tr>
                        <th>{{__('special-needs')}}</th>
                        <td>
                            {{!empty($student->detail->special_needs) ? 'YES' : 'NO'}}
                        </td>
                    </tr>

                    <tr>
                        <th>{{__('special-needs-description')}}</th>
                        <td>
                            {{$student->detail->special_needs_description ?? ''}}
                        </td>
                    </tr>
                </table>
            </div>


            <div class="col-12 mt-2">
                <h4 class="text-center">{{__('parents')}}}</h4>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('father')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('fathers-name')}}</th>
                        <td>{{$student->detail->father->full_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('email')}}</th>
                        <td>{{$student->detail->father->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('address')}}</th>
                        <td>{{$student->detail->father->address ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('mother')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('mothers-name')}}</th>
                        <td>{{$student->detail->mother->full_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('email')}}</th>
                        <td>{{$student->detail->mother->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('address')}}</th>
                        <td>{{$student->detail->mother->address ?? ''}}></td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__("family-members")}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <thead>
                    <tr>
                        <th>{{__('name')}}</th>
                        <th>{{__('relation')}}</th>
                        <th>{{__('phone')}}</th>
                        <th>{{__('address')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->members as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>{{$member->relation}}</td>
                            <td>{{$member->phone}}</td>
                            <td>{{$member->address}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('guardian')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('guardians-name')}}</th>
                        <td>{{$student->detail->guardian->full_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__("email")}}</th>
                        <td>{{$student->detail->guardian->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('address')}}</th>
                        <td>{{$student->detail->guardian->address ?? ''}}></td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('emergency-contact')}}</h4>
            </div>


            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('name')}}</th>
                        <td>{{$student->emergencyContact->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('relation')}}</th>
                        <td>{{$student->emergencyContact->relation ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('address')}}</th>
                        <td>{{$student->emergencyContact->address ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__("contact")}}</th>
                        <td>{{$student->emergencyContact->phone ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('family-doctor')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('name')}}</th>
                        <td>{{$student->doctor->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('phone')}}</th>
                        <td>{{$student->address->phone ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>
                            {{__('address')}}
                        </th>
                        <td>{{$student->doctor->name ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>
                            {{__('transportation-information')}}
                        </th>
                        <td>{{$student->detail->transportation_information ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('special-services')}}</th>
                        <td>{{$student->detail->specail_service ?? ''}}</td>
                    </tr>
                </table>

            </div>

            <div class="col-12 my-2">

                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('academic-year')}}</th>
                        <td>{{$student->detail->academicYear->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>
                            {{__('grade-year')}}
                        </th>
                        <td>{{$student->detail->gradeYear->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('program')}}</th>
                        <td>{{$student->detail->program->program_name ?? ''}}</td>
                    </tr>
                </table>

            </div>

            <div class="col-12 my-2">
                <h4>{{__('course')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('title')}}</th>
                        <th>{{__('course-no')}}.</th>
                        <th>{{__('credits')}}</th>
                        <th>{{__('pass-mark')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->courses as $course)
                        <tr>
                            <td>{{$course->title}}</td>
                            <td>{{$course->course_no}}</td>
                            <td>{{$course->number_of_credits}}</td>
                            <td>{{$course->pass_mark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('classes')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('class-code')}}</th>
                        <th>{{__('class-name')}}</th>
                        <th>{{__('teacher')}}</th>
                        <th>{{__('subject')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{$class->code ?? ''}}</td>
                            <td>{{$class->name ?? ''}}</td>
                            <td>{{$class->teacher->full_name ?? ''}}</td>
                            <td>{{$class->course->title ?? ''}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('teachers')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('teacher-name')}}</th>
                        <th>{{__('phone')}}</th>
                        <th>{{__('email')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{$teacher->full_name}}</td>
                            <td>{{$teacher->mobile_phone ?? ''}}</td>
                            <td>{{$teacher->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('case-manager')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('first-name')}}</th>
                        <td>{{$student->caseManager->first_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('last-name')}}</th>
                        <td>{{$student->caseManager->last_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('phone')}}</th>
                        <td>{{$student->caseManager->phone ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>
                            {{__('address')}}
                        </th>
                        <td>{{$student->caseManager->address->name ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('plan-no')}}.</th>
                        <th>{{__("plan-details")}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('assessments')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('assessment-title')}}</th>
                        <th>{{__('subject')}}</th>
                        <th>{{__('status')}}</th>
                        <th>{{__('mark')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assessments as $assessment)
                        <tr>
                            <td>{{$assessment->title}}</td>
                            <td>{{$assessment->course->title ?? ''}}</td>
                            <td>{{$assessment->pivot->status ?? ''}}</td>
                            <td>{{$assessment->pivot->mark ?? ''}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('appeal-requests')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered" id="mark_appeals_table">
                    <thead>
                    <tr>
                        <th>{{__('file-no')}}.</th>
                        <th>{{__('to-teacher')}}</th>
                        <th>{{__('subject-course')}}</th>
                        <th>{{__('semester')}}</th>
                        <th>{{__('received-mark')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($markAppeals as $markAppeal)
                        <tr>
                            <td>{{$markAppeal->file_no}}</td>
                            <td>{{$markAppeal->toTeacher->full_name ?? ''}}</td>
                            <td>{{$markAppeal->course->title ?? ''}}</td>
                            <td>{{$markAppeal->semester->name ?? ''}}</td>
                            <td>{{$markAppeal->received_mark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('attendances')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('date')}}</th>
                        <th>{{__('attendance-type')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendances as $att)
                        <td>{{$att->date}}</td>
                        <td>{{$att->type}}</td>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('notices')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('date')}}</th>
                        <th>{{__('priority')}}</th>
                        <th>{{__('subject')}}</th>
                        <th>{{__('message')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notices as $notice)
                        <tr>
                            <td>{{$notice->notice_date_time}}</td>
                            <td>{{$notice->priority}}</td>
                            <td>{{$notice->subject}}</td>
                            <td>{{$notice->message}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('complaints')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__("award-and-achievement")}}</th>
                    </tr>
                    <tr>
                        <th>{{__("parking-stall-no")}}</th>
                    </tr>
                </table>
            </div>

            <div class="col-12 my-2">
                <h4>{{__('car-info')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('name')}}</th>
                        <td>{{$student->car->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('model')}}</th>
                        <th>{{$student->car->model ?? ''}}</th>
                    </tr>
                    <tr>
                        <th>{{__('color')}}</th>
                        <td>{{$student->car->color ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('plate-no')}}</th>
                        <td>{{$student->car->plate_no ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('policy-no')}}</th>
                        <td>{{$student->car->policy_no ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('expiry-date')}}</th>
                        <td>{{$student->car->expiry_date ?? ''}}</td>
                    </tr>
                </table>
            </div>

            <div class="col-12 mt-2">
                <table class="table table-bordered list-table">
                    <tr>
                        <th>{{__('bike-info')}}</th>
                        <td>{{$student->bike_info}}</td>
                    </tr>
                    <tr>
                        <th>{{__("storage-locker-no")}}</th>
                        <td>{{$student->locker_no}}</td>
                    </tr>
                    <tr>
                        <th>{{__('volunteer-activities')}}</th>
                        <td>{{$student->volunteer_activites ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('account-statement')}}</th>
                    </tr>
                    <tr>
                        <th>{{__("user-activity")}}</th>
                    </tr>
                    <tr>
                        <th>{{__('communication-history')}}</th>
                        <td>No Data</td>
                    </tr>
                    <tr>
                        <th>{{__('discussion-boards-records')}}</th>
                        <th>No data</th>
                    </tr>
                    <tr>
                        <th>{{__('comment')}}</th>
                        <td>{{$student->comment ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>{{__('feedback')}}</th>
                        <td>{{$student->feedback ?? ''}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </x-content>
@endsection
