<?php

namespace App\Models;

use App\Models\Scopes\FilterBySchoolScope;
use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory, FilterBySchool;

    protected $fillable = ['name', 'start_date', 'end_date', 'school_id'];

    static function booted()
    {
        parent::booted();
        static::addGlobalScope(new FilterBySchoolScope());
    }

    static function getForDropdown()
    {
        return static::pluck('name', 'id');
    }

    static function getCurrentAcademicYear()
    {
        return static::where('is_default', 1)
            ->first();
    }

}
