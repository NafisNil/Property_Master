<?php

namespace App\Models;

use App\Models\Scopes\FilterBySchoolScope;
use App\Traits\AppendUnique;
use App\Traits\FilterBySchool;
use App\Traits\FindByUniqueId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Editor\Fields\Field;

class TermSemester extends Model
{
    use HasFactory, FilterBySchool, AppendUnique, FindByUniqueId;

    protected $table = 'term_semester';

    protected $fillable = [
        'school_id', 'campus_id', 'code', 'start_date', 'academic_year_id',
        'end_date', 'status', 'created_by', 'created_at',
        'updated_by'
    ];

    static function booted()
    {
        parent::booted(); // TODO: Change the autogenerated stub
        static::addGlobalScope(new FilterBySchoolScope());
    }

    public static function getForDropdown()
    {
        return static::pluck('code', 'id');
    }

    function campus()
    {
        return $this->belongsTo(SchoolCampus::class, 'campus_id');
    }

    function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

}
