<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $table = 'workshop';

    protected $fillable = [
        'school_id', 'workshop_no', 'workshop_type', 'teacher_instructor_qty', 'teacher_instructor_ssistant_qty',
        'typical_student_qty', 'handicapped_students_qty', 'special_needs_students_qty', 'visitors_qty', 'guest_qty', 'total_qty',
        'workshop_campus', 'workshop_seats', 'workshop_fixed_asset', 'workshop_safety_and_security',
        'workshop_safety_and_insurance_protection', 'workshop_for_accounting',
        'workshop_rules_and_policies', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
