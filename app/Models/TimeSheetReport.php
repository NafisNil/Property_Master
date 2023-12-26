<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheetReport extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    function items(){
        return $this->hasMany(TimeSheetItem::class, 'time_sheet_id');
    }

}
