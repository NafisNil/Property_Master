<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationDeadlines extends Model
{
    use HasFactory;

    protected $table = 'deadlines';

    protected $fillable = [
        'school_id', 'event_code', 'event_name', 'due_on', 'recuring_cycle', 'comment', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
