<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassClosedDays extends Model
{
    use HasFactory;

    protected $table = 'class_closed_days';

    protected $fillable = [
        'close_date', 'description', 'comment', 'status', 'created_by', 'created_at', 'updated_by'
    ];
    
//    'classes_scheduled_days', 'cost_center', 'assessments_schedule_dates', 'class_closed_days',
}
