<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAttendance extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function class(){
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    function student(){
        return $this->belongsTo(User::class, 'student_id');
    }

}
