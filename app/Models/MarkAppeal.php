<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use App\Traits\HasAttachments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkAppeal extends Model
{
    use HasFactory, HasAttachments;

    protected $guarded = ['id'];

    function fromStudent(){
        return $this->belongsTo(User::class, 'from_student_id');
    }

    function toTeacher(){
        return $this->belongsTo(User::class, 'to_teacher_id');
    }

    function assessment(){
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }

    function course(){
        return $this->belongsTo(SubjectCourse::class, 'course_id');
    }

    function semester(){
        return $this->belongsTo(TermSemester::class, 'semester_id');
    }

}
