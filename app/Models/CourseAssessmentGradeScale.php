<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAssessmentGradeScale extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'assessment_type_id', 'grade', 'description'
    ];

    function assessmentType(){
        return $this->belongsTo(AssesmentType::class, 'assessment_type_id');
    }

}
