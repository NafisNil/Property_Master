<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClosedDays extends Model
{
    use HasFactory;

    protected $table = 'school_closed_days';

    protected $fillable = [
        'school_id', 'event_name', 'date', 'comment', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
