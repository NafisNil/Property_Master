<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory, FilterBySchool;

    protected $table = 'announcent';

    protected $fillable = [
        'name', 'status', 'created_by', 'created_at', 'updated_by'
    ];
}
