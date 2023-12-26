<?php

namespace App\Models;

use App\Traits\FilterBySchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory, FilterBySchool;

    protected $guarded = ['id'];

    function class(){
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    function classroom(){
        return $this->belongsTo(Classroom::class, 'room_id');
    }

}
