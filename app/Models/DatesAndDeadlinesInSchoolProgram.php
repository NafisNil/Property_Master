<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatesAndDeadlinesInSchoolProgram extends Model
{
    use HasFactory;

    protected $table = 'dates_and_deadlines_in_school_program';

    protected $fillable = [
        'information_session', 'accepting_application', 'registration', 'stating_program', 'ending_program',
        'school_program', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
