<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'campus';

    protected $fillable = [
        'school_id', 'name', 'address', 'status', 'created_by', 'created_at', 'updated_by'
    ];

    static function getSchoolCampuses($schoolId)
    {
        return self::where('school_id', $schoolId)
            ->get();
    }

    static function getForDropdown(){
        return static::pluck("name", 'id');
    }

}
