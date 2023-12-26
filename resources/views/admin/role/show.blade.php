@extends('admin.layouts.master')


@section('content')
    <x-content>
        <x-slot name="header">
            <h4>Role</h4>
        </x-slot>

        <div>
            <x-form action="{{route('admin.roles.update-permissions', $role->id)}}">
                <div class="row">

                    <!--Program-->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Program and Grade Year</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'program.view', in_array('program.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'program.create', in_array('program.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'program.edit', in_array('program.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'program.post', in_array('program.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'program.repost', in_array('program.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'program.delete', in_array('program.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subject And Course -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Subject Course</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'course.view', in_array('course.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'course.create', in_array('course.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'course.edit', in_array('course.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'course.post', in_array('course.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'course.repost', in_array('course.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'course.delete', in_array('course.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--School Profile-->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">School Profile</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'school-profile.view', in_array('school-profile.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'school-profile.create', in_array('school-profile.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'school-profile.edit', in_array('school-profile.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'school-profile.post', in_array('school-profile.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'school-profile.repost', in_array('school-profile.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'school-profile.delete', in_array('school-profile.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campus -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Campus</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'campus.view', in_array('campus.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'campus.create', in_array('campus.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'campus.edit', in_array('campus.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'campus.post', in_array('campus.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'campus.repost', in_array('campus.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'campus.delete', in_array('campus.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Term/Semester-->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Term/Semester</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'semester.view', in_array('semester.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'semester.create', in_array('semester.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'semester.edit', in_array('semester.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'semester.post', in_array('semester.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'semester.repost', in_array('semester.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'semester.delete', in_array('semester.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Class -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Class</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class.view', in_array('class.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class.create', in_array('class.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class.edit', in_array('class.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class.post', in_array('class.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class.repost', in_array('class.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class.delete', in_array('class.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--  Class Attendances --->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Class Attendances</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class-attendance.view', in_array('class-attendance.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class-attendance.create', in_array('class-attendance.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class-attendance.edit', in_array('class-attendance.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class-attendance.post', in_array('class-attendance.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class-attendance.repost', in_array('class-attendance.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'class-attendance.delete', in_array('class-attendance.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Registration -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Student Registration</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'student-registration.view', in_array('student-registration.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'student-registration.create', in_array('student-registration.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'student-registration.edit', in_array('student-registration.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'student-registration.post', in_array('student-registration.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'student-registration.repost', in_array('student-registration.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'student-registration.delete', in_array('student-registration.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Class Room -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Class Room</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'classroom.view', in_array('classroom.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'classroom.create', in_array('classroom.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'classroom.edit', in_array('classroom.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'classroom.post', in_array('classroom.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'classroom.repost', in_array('classroom.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'classroom.delete', in_array('classroom.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assessments -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Assessments</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'assessment.view', in_array('assessment.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'assessment.create', in_array('assessment.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'assessment.edit', in_array('assessment.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'assessment.post', in_array('assessment.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'assessment.repost', in_array('assessment.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'assessment.delete', in_array('assessment.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mark Appeal-->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Mark Appeal</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'mark-appeal.view', in_array('mark-appeal.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'mark-appeal.create', in_array('mark-appeal.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'mark-appeal.edit', in_array('mark-appeal.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'mark-appeal.post', in_array('mark-appeal.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'mark-appeal.repost', in_array('mark-appeal.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'mark-appeal.delete', in_array('mark-appeal.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notice -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Notices</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'notice.view', in_array('notice.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'notice.create', in_array('notice.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'notice.edit', in_array('notice.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'notice.post', in_array('notice.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'notice.repost', in_array('notice.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'notice.delete', in_array('notice.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Holders -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Account Holders</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account-holder.view', in_array('account-holder.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account-holder.create', in_array('account-holder.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account-holder.edit', in_array('account-holder.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account-holder.post', in_array('account-holder.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account-holder.repost', in_array('account-holder.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account-holder.delete', in_array('account-holder.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Team</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.view', in_array('team.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.create', in_array('team.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.edit', in_array('team.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.post', in_array('team.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.repost', in_array('team.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.delete', in_array('team.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- textbook -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Text Books</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'text-book.view', in_array('text-book.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'text-book.create', in_array('text-book.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'text-book.edit', in_array('text-book.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'text-book.post', in_array('text-book.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'text-book.repost', in_array('text-book.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'text-book.delete', in_array('text-book.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Announcement -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Announcement</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'announcement.view', in_array('announcement.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'announcement.create', in_array('announcement.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'announcement.edit', in_array('announcement.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'announcement.post', in_array('announcement.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'announcement.repost', in_array('announcement.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'announcement.delete', in_array('announcement.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Daily Report -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Daily Report</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'daily-report.view', in_array('daily-report.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'daily-report.create', in_array('daily-report.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'daily-report.edit', in_array('daily-report.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'daily-report.post', in_array('daily-report.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'daily-report.repost', in_array('daily-report.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'daily-report.delete', in_array('daily-report.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'form.view', in_array('form.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'form.create', in_array('form.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'form.edit', in_array('form.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'form.post', in_array('form.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'form.repost', in_array('form.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'form.delete', in_array('form.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Events</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'event.view', in_array('event.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'event.create', in_array('event.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'event.edit', in_array('event.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'event.post', in_array('event.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'event.repost', in_array('event.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'event.delete', in_array('event.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Log-->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Activity Logs</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'activity-log.view', in_array('activity-log.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'activity-log.create', in_array('activity-log.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'activity-log.edit', in_array('activity-log.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'activity-log.post', in_array('activity-log.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'activity-log.repost', in_array('activity-log.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'activity-log.delete', in_array('activity-log.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Project</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'project.view', in_array('project.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'project.create', in_array('project.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'project.edit', in_array('project.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'project.post', in_array('project.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'project.repost', in_array('project.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'project.delete', in_array('project.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accounts -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Accounts</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account.view', in_array('account.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account.create', in_array('account.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account.edit', in_array('account.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account.post', in_array('account.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account.repost', in_array('account.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'account.delete', in_array('account.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Fixed Assets-->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Fixed Asset</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.view', in_array('team.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.create', in_array('team.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.edit', in_array('team.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.post', in_array('team.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.repost', in_array('team.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'team.delete', in_array('team.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory Items -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Inventory Items</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'inventory-item.view', in_array('inventory-item.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'inventory-item.create', in_array('inventory-item.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'inventory-item.edit', in_array('inventory-item.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'inventory-item.post', in_array('inventory-item.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'inventory-item.repost', in_array('inventory-item.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'inventory-item.delete', in_array('inventory-item.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Service Items -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Service Items</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'service-item.view', in_array('service-item.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'service-item.create', in_array('service-item.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'service-item.edit', in_array('service-item.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'service-item.post', in_array('service-item.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'service-item.repost', in_array('service-item.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'service-item.delete', in_array('service-item.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Settings -->

                    <div class="col-sm-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Settings</div>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'setting.view', in_array('setting.view',$permissions)) !!}
                                        View
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'setting.create', in_array('setting.create', $permissions)) !!}
                                        New/Save
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'setting.edit', in_array('setting.edit', $permissions)) !!}
                                        Edit/Update
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'setting.post', in_array('setting.post', $permissions)) !!}
                                        Post
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'setting.repost', in_array('setting.repost', $permissions)) !!}
                                        Repost
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        {!! Form::checkbox('permissions[]', 'setting.delete', in_array('setting.delete', $permissions)) !!}
                                        Delete
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </x-form>
        </div>

    </x-content>
@endsection
