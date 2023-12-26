<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'school_id', 'code', 'name', 'school_level', 'credential', 'study_option', 'department', 'delivery_method', 'duration_weeks', 'subjects_courses', 'special_needs', 'handicap', 'domestic', 'international', 'available', 'requirements', 'contact', 'apply', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
