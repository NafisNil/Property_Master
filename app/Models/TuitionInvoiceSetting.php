<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionInvoiceSetting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function program(){
        return $this->belongsTo(SchoolProgram::class, 'program_id');
    }

    function gradeYear(){
        return $this->belongsTo(SchoolProgram::class, 'grade_year_id');
    }

}
