<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesSchedules extends Model
{
    use HasFactory;

    protected $table = 'classes_schedules';

    protected $fillable = [
        'school_id', 'class_no', 'campus', 'from_date', 'to_date', 'from_time', 'to_time', 'course_code', 'teacher_instructor_name', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
