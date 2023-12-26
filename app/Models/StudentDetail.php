<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function father(){
        return $this->belongsTo(User::class, 'father_id');
    }

    function mother(){
        return $this->belongsTo(User::class, 'mother_id');
    }

    function guardian(){
        return $this->belongsTo(User::class, 'guardian_id');
    }

    function semester(){
        return $this->belongsTo(TermSemester::class,'semester_id');
    }

    function program(){
        return $this->belongsTo(SchoolProgram::class, 'program_id');
    }

    function academicYear(){
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    function gradeYear(){
        return $this->belongsTo(SchoolProgram::class, 'grade_year_id');
    }

    function studentType(){
        return $this->belongsTo(StudentType::class, 'student_type_id');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function courses(){
        return $this->belongsToMany(SubjectCourse::class, 'student_courses', 'student_id', 'course_id', 'user_id', 'id');
    }

}
