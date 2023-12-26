<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $table = 'student_registration';

    protected $guarded = ['id'];

    function father(){
        return $this->belongsTo(User::class, 'father_id');
    }

    function mother(){
        return $this->belongsTo(User::class, 'mother_id');
    }

    function semester(){
        return $this->belongsTo(TermSemester::class,'semester');
    }

    function program(){
        return $this->belongsTo(SchoolProgram::class, 'program_id');
    }

}
