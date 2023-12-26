<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'school_class';

    public $statuses = [
        'progress' => 'Progress',
        'closed' => 'Closed',
        'cancelled' => 'Cancelled'
    ];

    protected $fillable = [
        'school_id', 'code', 'name', 'classroom_no', 'participants_limitations',
        'academic_year_id', 'subject_course_id', 'program_id', 'status', 'created_by', 'created_at', 'updated_by',
        'year_id', 'teacher_id', 'start_date', 'end_date', 'semester_id'
    ];

    function course()
    {
        return $this->belongsTo(SubjectCourse::class, 'subject_course_id');
    }

    function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    function schedules()
    {
        return $this->hasMany(ClassSchedule::class, 'class_id');
    }

    function program(){
        return $this->belongsTo(SchoolProgram::class, 'program_id');
    }

    function getStudents()
    {
        return User::whereHas('courses', function ($query) {
            $query->where('subject_course.id', $this->subject_course_id);
        })->get();
    }

    static function getForDropdown()
    {
        //TODO try to filter based on logged user type
        return self::pluck('code', 'id')
            ->toArray();
    }

}
