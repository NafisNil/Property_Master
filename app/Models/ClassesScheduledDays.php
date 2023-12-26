<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesScheduledDays extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'classes_scheduled_days';

    protected $fillable = [
        'class_schedule_no', 'class_schedule_topic', 'class_schedule_date', 'class_schedule_day', 'class_schedule_time_from',
        'class_schedule_time_to', 'status', 'created_by', 'created_at', 'updated_by'
    ];

//    'classes_scheduled_days', 'cost_center', 'assessments_schedule_dates', 'class_closed_days',
}
