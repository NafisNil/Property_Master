<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramInStudentRegistration extends Model
{
    use HasFactory;

    protected $table = 'program_in_student_registration';

    protected $fillable = [
        'school_program_id', 'student_registration_id', 'program_availability', 'program_start', 'program_end', 'program_duration',
        'number_of_courses', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
