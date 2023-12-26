<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'school_class';

    protected $fillable = [
        'school_id', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
