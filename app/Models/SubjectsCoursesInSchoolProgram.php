<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsCoursesInSchoolProgram extends Model
{
    use HasFactory;

    protected $table = 'subjects_courses_in_school_program';

    protected $fillable = [
        'subject_course', 'credits', 'tuition', 'textbooks', 'other_fees',
        'total', 'comment', 'school_program', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
