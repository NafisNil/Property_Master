<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

}
