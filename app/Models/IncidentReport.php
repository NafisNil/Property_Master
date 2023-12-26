<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

}
