<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model {

    use HasFactory, FilterBySchool;

    protected $table = 'classroom';
    protected $fillable = [
        'school_id', 'classroom_no', 'classroom_category', 'classroom_type', 'teacher_instructor_qty',
        'teacher_instructor_assistant_qty', 'typical_student_qty', 'handicapped_students_qty',
        'special_needs_students_qty', 'visitors_qty', 'guest_qty', 'total_qty', 'campus', 'status', 'created_by',
        'created_at', 'updated_by'
    ];

    static function getForDropdown(){
        return self::pluck('classroom_no', 'id');
    }

}
