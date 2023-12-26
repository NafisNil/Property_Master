<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarksStructure extends Model
{
    use HasFactory;

    protected $table = 'marks_structure';

    protected $fillable = [
        'school_id', 'assesment_type', 'course', 'school', 'grade', 'percent', 'passing_marks', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
