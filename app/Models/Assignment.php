<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'school_class';

    protected $fillable = [
        'school_id', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
