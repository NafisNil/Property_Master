<?php

namespace App\Models;

use App\Models\Scopes\FilterBySchoolScope;
use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SchoolProgram extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'school_program';
    protected $fillable = [
        'school_id', 'program_code', 'program_name', 'program_description', 'school_level_id', 'student_type_id',
        'credential_id', 'study_choice_id', 'delivery_method_id', 'entrance_requirements', 'semester',
        'program_length', 'status', 'created_by', 'created_at', 'updated_by', 'parent_id'
    ];

    public static function booted()
    {
        static::addGlobalScope(new FilterBySchoolScope());
    }

    public static function getForDropdown()
    {
        return static::whereNull('parent_id')
            ->where('status', 1)
            ->pluck('program_code', 'id');
    }

    public static function getGradeYearForDropdown($parent = null)
    {
        $query = static::whereNotNull('parent_id')
            ->where('status', 1);

        if (!empty($parent)) {
            $query->where('parent_id', $parent);
        }
        return $query->pluck('program_code', 'id');
    }

    public static function getForSchool()
    {
        $user = auth()->id();
        return self::where('school_id', $user->school)
            ->get();
    }

    function courses()
    {
        return $this->belongsToMany(SubjectCourse::class, 'program_courses', 'program_id', 'course_id')
            ->withPivot(['tuition', 'textbooks', 'other_fees', 'total', 'comment']);
    }

    function schoolLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'school_level_id');
    }

    function credential()
    {
        return $this->belongsTo(Credential::class, 'credential_id');
    }

    function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class, 'delivery_method_id');
    }

    function programLength()
    {
        return $this->belongsTo(ProgramLength::class, 'program_length');
    }

    function feeCategories()
    {
        return $this->belongsToMany(FeeCategory::class, 'program_fee_categories', 'program_id', 'fee_category_id')
            ->withPivot(['amount', 'due_date']);
    }

    function dates()
    {
        return $this->hasMany(ProgramDate::class, 'program_id');
    }

    function parent()
    {
        return $this->belongsTo(SchoolProgram::class, 'parent_id');
    }

    function students()
    {
        return $this->hasMany(StudentDetail::class, 'program_id');
    }

    function gradeYearStudents()
    {
        return $this->hasMany(StudentDetail::class, 'grade_year_id');
    }
}
