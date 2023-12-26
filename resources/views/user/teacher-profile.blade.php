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
            <h3>{{__($userType->slug. '-profile')}}</h3>
            <a class="btn btn-primary" href="{{route('account-holders.edit', $accountHolder->id)}}">
                {{__('update-information')}}</a>
        </x-slot>

        <div class="row mb-3">
            <div class="col-sm-4">
                <div class="user-photo-container">
                    <img src="{{$accountHolder->image_url}}"
                    />
                </div>
            </div>
            <div class="offset-8"></div>
        </div>

        <div class="col-12">
            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('id')}}</th>
                    <td>{{$accountHolder->id}}</td>
                </tr>
                <tr>
                    <th>{{__('status')}}</th>
                    <td>
                        @if($accountHolder->status)
                            {{__('active')}}
                        @else
                            {{__('inactive')}}
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-12 my-2">
            <h3>{{__('personal-information')}}</h3>
        </div>

        <div class="col-12">
            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('first-name')}}</th>
                    <td>{{$accountHolder->first_name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('last-name')}}:</th>
                    <td>{{$accountHolder->last_name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('middle-name')}}:</th>
                    <td>{{$accountHolder->middle_name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('date-of-birth')}}</th>
                    <td>{{$accountHolder->dob ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('gender')}}</th>
                    <td>{{$accountHolder->gender ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('hire-date')}}</th>
                    <td>{{$accountHolder->hire_date}}</td>
                </tr>
                <tr>
                    <th>{{__('age-in-hiring-date')}}</th>
                    <td>
                        @if($accountHolder->hire_date)
                            {{\Carbon\Carbon::parse($accountHolder->hire_date)->diff(now())
             ->format('%y years, %m months and %d days')}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>{{__('current-age')}}</th>
                    <td>
                        @if($accountHolder->dob)
                            {{\Carbon\Carbon::parse($accountHolder->dob)->diff(now())
             ->format('%y years, %m months and %d days')}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>{{__('years-n-service')}}</th>
                </tr>
                <tr>
                    <th>{{__('years-n-left-in-service')}}</th>
                </tr>

                <tr>
                    <th>{{__('last-credit-check')}}</th>
                    <td>{{$accountHolder->last_credit_check ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('last-criminal-background-check')}}</th>
                    <td>{{$accountHolder->last_criminal_bg_check ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('last-drag-check')}}</th>
                    <td>{{$accountHolder->last_drug_check ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('termination-date')}}</th>
                    <td>{{$accountHolder->termination_date}}</td>
                </tr>

            </table>
        </div>

        <div class="col-12">
            <h4 class="my-2">
                {{__('address')}}
            </h4>
        </div>

        <div class="col-12">

            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('country')}}</th>
                    <td>{{$accountHolder->add ? $accountHolder->add->country : ''}}</td>
                </tr>
                <tr>
                    <th>{{__('state')}}</th>
                    <td>{{$accountHolder->add->state ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('city')}}</th>
                    <td>{{$accountHolder->add->city ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('address')}}</th>
                    <td>{{$accountHolder->address->name ?? ''}}</td>
                </tr>
            </table>

        </div>

        <div class="col-12">

            <h4 class="my-3">{{__('contact')}}</h4>

        </div>

        <div class="col-12">

            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('phone-office')}}</th>
                    <td>{{$accountHolder->contact->office ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('mobile')}}</th>
                    <td>{{$accountHolder->contact->mobile ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('email')}}</th>
                    <td>{{$accountHolder->contact->email ?? ''}}</td>
                </tr>
            </table>

        </div>


        <div class="col-12">

            <h4 class="my-3">{{__('emergency-contact')}}</h4>

            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('person-name')}}</th>
                    <td>{{$accountHolder->emergencyContact->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('relation')}}</th>
                    <td>{{$accountHolder->emergency->relation ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('email')}}</th>
                    <td>{{$accountHolder->emergencyContact->email ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('phone')}}</th>
                    <td>{{$accountHolder->emergencyContact->phone ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('address')}}</th>
                    <td>{{$accountHolder->emergencyContact->address ?? ''}}</td>
                </tr>
            </table>
        </div>

        <div class="col-12">
            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('department')}}</th>
                    <td>{{$accountHolder->department ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('session')}}</th>
                </tr>
                <tr>
                    <th>{{__('position')}}</th>
                    <td>{{$accountHolder->designation ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('education')}}</th>
                    <td>{{$accountHolder->designation ?? ''}}</td>
                </tr>
            </table>
        </div>

        <div class="col-12">
            <h4 class="my-2">{{__('professional-background')}}</h4>
            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('educational-qualifications')}}</th>
                    <td>{{$accountHolder->education ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('teaching-experience')}}</th>
                    <td>{{$accountHolder->teaching_experience ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__("certifications-and-training")}}</th>
                    <td>{{$accountHolder->certification_and_training ?? ''}}</td>
                </tr>
            </table>
        </div>

        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <th>{{__('employment-history')}}</th>
                    <td>dd</td>
                </tr>
            </table>
        </div>

        @if($userType->slug == 'teacher')

            <div class="col-12">
                <h4 class="my-2">{{__('courses')}}</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('title')}}</th>
                        <th>{{__('course-no')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$course->title}}</td>
                            <td>{{$course->course_no}}</td>
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
                        <th>{{__('subject-course')}}</th>
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
                <h4>{{__('assessments')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('title')}}</th>
                        <th>{{__('subject-course')}}</th>
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
                <h4>{{__('mark-appeal-requests')}}</h4>
            </div>

            <div class="col-12">
                <table class="table table-bordered" id="mark_appeals_table">
                    <thead>
                    <tr>
                        <th>{{__('file-no')}}</th>
                        <th>{{__("from-accountHolder")}}</th>
                        <th>{{__('subject-course')}}</th>
                        <th>{{__('semester')}}</th>
                        <th>{{__('received-mark')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($markAppeals as $markAppeal)
                        <tr>
                            <td>{{$markAppeal->file_no}}</td>
                            <td>{{$markAppeal->fromaccountHolder->full_name ?? ''}}</td>
                            <td>{{$markAppeal->course->title ?? ''}}</td>
                            <td>{{$markAppeal->semester->name ?? ''}}</td>
                            <td>{{$markAppeal->received_mark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @endif

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
            <table class="table table-bordered">

            </table>
        </div>

        <div class="col-12">
            <table class="table table-border list-table">
                <tr>
                    <th>{{__('awards-and-achievement')}}</th>
                </tr>
                <tr>
                    <th>{{__('parking-stall-no')}}</th>
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
                    <td>{{$accountHolder->car->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('model')}}</th>
                    <th>{{$accountHolder->car->model ?? ''}}</th>
                </tr>
                <tr>
                    <th>{{__('color')}}</th>
                    <td>{{$accountHolder->car->color ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('plate-no')}}</th>
                    <td>{{$accountHolder->car->plate_no ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('policy-no')}}</th>
                    <td>{{$accountHolder->car->policy_no ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('expiry-date')}}</th>
                    <td>{{$accountHolder->car->expiry_date ?? ''}}</td>
                </tr>
            </table>
        </div>

        <div class="col-12 mt-2">
            <table class="table table-bordered list-table">
                <tr>
                    <th>{{__('bike-info')}}</th>
                    <td>{{$accountHolder->bike_info}}</td>
                </tr>
                <tr>
                    <th>{{__("storage-locker-no")}}</th>
                    <td>{{$accountHolder->locker_no}}</td>
                </tr>
                <tr>
                    <th>{{__('volunteer-activities')}}</th>
                    <td>{{$accountHolder->volunteer_activites ?? ''}}</td>
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
                    <td>{{$accountHolder->Rcomment ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('feedback')}}</th>
                    <td>{{$accountHolder->feedback ?? ''}}</td>
                </tr>
            </table>
        </div>

    </x-content>
@endsection
