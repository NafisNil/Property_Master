<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function type(){
        return $this->belongsTo(ScheduleType::class, 'schedule_type_id');
    }

    function participants(){
        return $this->hasMany(ScheduleParticipant::class, 'schedule_id');
    }

    function recurrences(){
        return $this->hasMany(ScheduleRecurrence::class, 'schedule_id');
    }

    function preparedBy(){
        return $this->belongsTo(User::class, 'prepared_by');
    }

}
