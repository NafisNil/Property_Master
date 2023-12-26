<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesAndCharges extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'fees_and_charges';

    protected $guarded = ['id'];

    function getForDropdown()
    {
        return static::pluck('title', 'id');
    }

    function category()
    {
        return $this->belongsTo(FeeCategory::class, 'category_id');
    }

    function program(){
        return $this->belongsTo(SchoolProgram::class, 'program_id');
    }

    function gradeYear(){
        return $this->belongsTo(SchoolProgram::class, 'grade_year_id');
    }

}
